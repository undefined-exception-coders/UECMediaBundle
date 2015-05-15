<?php

namespace UEC\MediaBundle\Resolver;

use UEC\MediaBundle\Model\MediaInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Services\ProviderServiceInterface;

class MediaProviderResolver implements MediaProviderResolverInterface
{
    private $providerService;

    function __construct(ProviderServiceInterface $providerService)
    {
        $this->providerService = $providerService;
    }

    public function getMediaProvider(MediaInterface $media)
    {
        return $this->providerService
            ->getProviderManager($media->getContext())
            ->getMediaProviderManager()
            ->findMediaProvider($media);
    }
}