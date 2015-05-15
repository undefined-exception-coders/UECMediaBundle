<?php

namespace UEC\MediaBundle\Services;

use UEC\MediaBundle\Model\MediaManagerInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Services\ProviderService;

class MediaService
{
    /**
     * @var ProviderServiceInterface
     */
    protected $providerService;

    /**
     * @var \UEC\MediaBundle\Model\MediaManagerInterface
     */
    protected $mediaManager;

    function __construct(ProviderServiceInterface $providerService, MediaManagerInterface $mediaManager)
    {
        $this->providerService = $providerService;
        $this->mediaManager = $mediaManager;
    }

    /**
     * Create an empty instance of the MediaProvider by the context
     *
     * @param $context
     * @return MediaProviderInterface
     */
    public function create($context)
    {
        $providerManager = $this->providerService->getProviderManager($context);

        $media = $this->mediaManager->createMedia($context);

        $mediaProvider = $providerManager->getMediaProviderManager()->createMediaProvider();
        $mediaProvider->setMedia($media);

        return $mediaProvider;
    }
}