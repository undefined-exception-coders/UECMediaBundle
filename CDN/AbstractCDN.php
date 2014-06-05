<?php

namespace UEC\MediaBundle\CDN;

use UEC\MediaBundle\Model\MediaProviderInterface;

abstract class AbstractCDN implements CDNInterface
{
    /**
     * @var MediaProviderInterface
     */
    protected $mediaProvider;

    /**
     * @param \UEC\MediaBundle\Model\MediaProviderInterface $mediaProvider
     */
    public function setMediaProvider(MediaProviderInterface $mediaProvider)
    {
        $this->mediaProvider = $mediaProvider;
    }
} 