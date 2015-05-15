<?php

namespace UEC\MediaBundle\Resolver;

use UEC\MediaBundle\Model\MediaInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

interface MediaProviderResolverInterface
{
    /**
     * Find MediaProvider by Media
     *
     * @param MediaInterface $media
     * @return MediaProviderInterface
     */
    public function getMediaProvider(MediaInterface $media);
}