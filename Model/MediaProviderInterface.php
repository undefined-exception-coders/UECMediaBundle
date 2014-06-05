<?php

namespace UEC\MediaBundle\Model;

interface MediaProviderInterface extends MediaCommonInterface
{
    /**
     * Set media
     *
     * @param MediaInterface $media
     * @return MediaProviderInterface
     */
    public function setMedia(MediaInterface $media);

    /**
     * Get media
     *
     * @return MediaInterface
     */
    public function getMedia();
} 