<?php

namespace UEC\MediaBundle\Model;

abstract class MediaProvider implements MediaProviderInterface
{
    /**
     * Id and external key of table Media
     *
     * @var MediaInterface
     */
    protected $media;

    /**
     * Set media
     *
     * @param MediaInterface $media
     * @return MediaProviderInterface
     */
    public function setMedia(MediaInterface $media)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return MediaInterface
     */
    public function getMedia()
    {
        return $this->media;
    }
}