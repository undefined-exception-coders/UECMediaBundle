<?php

namespace UEC\MediaBundle\CDN;

use UEC\MediaBundle\Model\MediaCommonInterface;
use UEC\MediaBundle\Model\MediaInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Provider\ProviderManagerInterface;
use UEC\MediaBundle\Services\ProviderService;

class CDNManager
{
    /**
     * @var \UEC\MediaBundle\Services\ProviderService
     */
    protected $providerService;

    function __construct(ProviderService $providerService)
    {
        $this->providerService = $providerService;
    }

    /**
     * @param MediaCommonInterface $media
     * @return CDNInterface
     * @throws \Exception
     */
    public function media(MediaCommonInterface $media)
    {
        $context = null;
        $mediaProvider = null;

        if ($media instanceof MediaInterface) {
            $context = $media->getContext();
        } elseif ($media instanceof MediaProviderInterface) {
            $context = $media->getMedia()->getContext();
            $mediaProvider = $media;
        } else {
            throw new \Exception('Unsupported class');
        }

        /** @var $providerManager ProviderManagerInterface */
        $providerManager = $this->providerService->getProviderManager($context);

        if (null === $mediaProvider) {
            $mediaProvider = $providerManager->getMediaProviderManager()->findMediaProvider($media);
        }

        /** @var $cdn AbstractCDN */
        $cdn = $providerManager->getCdn();
        $cdn->setMediaProvider($mediaProvider);

        return $cdn;
    }
} 