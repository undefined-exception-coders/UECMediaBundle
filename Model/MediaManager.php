<?php

namespace UEC\MediaBundle\Model;

abstract class MediaManager implements MediaManagerInterface
{
    /**
     * Creates an empty media instance.
     *
     * @param string $context
     * @return MediaInterface
     */
    public function createMedia($context)
    {
        $class = $this->getClass();

        $media = new $class;
        $media->setContext($context);

        return $media;
    }

    /**
     * Updates a media.
     *
     * @param MediaInterface $media
     * @param boolean $andFlush
     * @return void
     */
    public function updateMedia(MediaInterface $media, $andFlush = true)
    {
        $this->doSaveMedia($media, $andFlush);
    }

    abstract protected function doSaveMedia(MediaInterface $media);
}