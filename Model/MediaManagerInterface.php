<?php

namespace UEC\MediaBundle\Model;

interface MediaManagerInterface
{
    /**
     * Returns the media's fully qualified class name.
     *
     * @return string
     */
    public function getClass();

    /**
     * Creates an empty media instance.
     *
     * @param string $context
     * @return MediaInterface
     */
    public function createMedia($context);

    /**
     * Updates a media.
     *
     * @param MediaInterface $media
     * @param boolean $andFlush
     * @return void
     */
    public function updateMedia(MediaInterface $media, $andFlush = true);
}