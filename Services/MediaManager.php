<?php

namespace UEC\MediaBundle\Services;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormInterface;
use UEC\MediaBundle\Event\MediaEvent;
use UEC\MediaBundle\Event\MediaFileInfoEvent;
use UEC\MediaBundle\Event\MediaFileInfoPathEvent;
use UEC\MediaBundle\Event\MediaFileInfoPathUploadEvent;
use UEC\MediaBundle\Event\MediaUploadEvent;
use UEC\MediaBundle\FileSystem\FileNameGeneratorInterface;
use UEC\MediaBundle\Model\MediaManagerInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Path\PathGeneratorInterface;
use UEC\MediaBundle\UECMediaEvents;

class MediaManager
{
    /**
     * @var ProviderService
     */
    protected $providerService;

    /**
     * @var \UEC\MediaBundle\Path\PathGeneratorInterface
     */
    protected $pathGenerator;

    /**
     * @var \UEC\MediaBundle\FileSystem\FileNameGeneratorInterface
     */
    protected $fileNameGenerator;

    /**
     * @var \UEC\MediaBundle\Model\MediaManagerInterface
     */
    protected $mediaManager;

    /**
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $eventDispatcher;

    function __construct(
        ProviderService $providerService,
        PathGeneratorInterface $pathGenerator,
        FileNameGeneratorInterface $fileNameGenerator,
        MediaManagerInterface $mediaManager,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->providerService = $providerService;
        $this->pathGenerator = $pathGenerator;
        $this->fileNameGenerator = $fileNameGenerator;
        $this->mediaManager = $mediaManager;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Process the Form and return the persisted MediaProvider
     *
     * @param FormInterface $form
     * @return MediaProviderInterface
     */
    public function processForm(FormInterface $form)
    {
        $data = $form->getData();

        $this->save($data);

        return $data;
    }

    /**
     * Execute the full process for upload and persist MediaProvider
     *
     * @param MediaProviderInterface $mediaProvider
     */
    public function save(MediaProviderInterface $mediaProvider)
    {
        $context = $mediaProvider->getMedia()->getContext();
        $provider = $this->providerService->getProviderManager($context);

        $fileInfo = $provider->getFormProcessor()->getFileInfo($mediaProvider->getMedia()->getFile());

        $this->eventDispatcher->dispatch(UECMediaEvents::AFTER_PROCESS_FILE, new MediaFileInfoEvent($mediaProvider, $fileInfo));

        $mediaProvider->getMedia()->setName($fileInfo->getName());

        $filePath = $provider->getFileSystem()->getFilePath($fileInfo, $mediaProvider, $this->pathGenerator);

        $this->eventDispatcher->dispatch(UECMediaEvents::AFTER_GENERATE_FILE_PATH, new MediaFileInfoPathEvent($mediaProvider, $fileInfo, $filePath));

        if ($fileInfo->isUploadedFile()) {
            $filePath .= DIRECTORY_SEPARATOR.$this->fileNameGenerator->generate($fileInfo, $mediaProvider);
            $this->eventDispatcher->dispatch(UECMediaEvents::AFTER_GENERATE_FILE_NAME, new MediaFileInfoPathEvent($mediaProvider, $fileInfo, $filePath));
        }

        $mediaProvider->getMedia()->setPath($filePath);

        $uploadedResult = $provider->getFileSystem()->upload($fileInfo, $mediaProvider, $filePath);

        $this->eventDispatcher->dispatch(UECMediaEvents::AFTER_UPLOAD_FILE, new MediaFileInfoPathUploadEvent($mediaProvider, $fileInfo, $filePath, $uploadedResult));

        $provider->getMediaProviderManager()->fillMediaProviderData($mediaProvider, $uploadedResult);

        $this->eventDispatcher->dispatch(UECMediaEvents::AFTER_FILL_MEDIA_PROVIDER, new MediaUploadEvent($mediaProvider, $uploadedResult));

        $this->mediaManager->updateMedia($mediaProvider->getMedia());
        $provider->getMediaProviderManager()->updateMediaProvider($mediaProvider);

        $this->eventDispatcher->dispatch(UECMediaEvents::AFTER_PERSIST_MEDIA_PROVIDER, new MediaEvent($mediaProvider));
    }
} 