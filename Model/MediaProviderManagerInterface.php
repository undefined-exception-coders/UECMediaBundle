<?php

namespace UEC\MediaBundle\Model;

interface MediaProviderManagerInterface
{
    /**
     * Returns the mediaProvider's fully qualified class name.
     *
     * @return string
     */
    public function getClass();

    /**
     * Creates an empty media instance.
     *
     * @return MediaProviderInterface
     */
    public function createMediaProvider();

    /**
     * Updates a media.
     *
     * @param MediaProviderInterface $mediaProvider
     * @param boolean $andFlush
     * @return void
     */
    public function updateMediaProvider(MediaProviderInterface $mediaProvider, $andFlush = true);

    /**
     * Find mediaProvider by media
     *
     * @param MediaInterface $media
     * @return MediaProviderInterface
     */
    public function findMediaProvider(MediaInterface $media);

    /**
     * Fill mediaProvider fields
     *
     * @param MediaProviderInterface $mediaProvider
     * @param mixed $data
     * @return void
     */
    public function fillMediaProviderData(MediaProviderInterface &$mediaProvider, $data);
} 