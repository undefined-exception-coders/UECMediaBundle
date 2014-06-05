<?php

namespace UEC\MediaBundle\Model;

abstract class MediaProviderManager implements MediaProviderManagerInterface
{
    /**
     * Creates an empty media instance.
     *
     * @return MediaProviderInterface
     */
    public function createMediaProvider()
    {
        $class = $this->getClass();
        return new $class;
    }

    /**
     * Updates a media.
     *
     * @param MediaProviderInterface $mediaProvider
     *
     * @return void
     */
    public function updateMediaProvider(MediaProviderInterface $mediaProvider)
    {
        $this->doSaveMediaProvider($mediaProvider);
    }

    /**
     * Find MediaProvider by media
     *
     * @param MediaInterface $media
     * @return MediaProviderInterface
     */
    public function findMediaProvider(MediaInterface $media)
    {
        return $this->findOneBy(array(
            'media' => $media,
        ));
    }

    /**
     * Find one MediaImage by criteria
     *
     * @param array $criteria
     * @return MediaProviderInterface
     */
    abstract protected function findOneBy(array $criteria);

    /**
     * Persist MediaProvider
     *
     * @param MediaProviderInterface $mediaProvider
     * @return mixed
     */
    abstract protected function doSaveMediaProvider(MediaProviderInterface $mediaProvider);
}