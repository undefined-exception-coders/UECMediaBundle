<?php

namespace UEC\MediaBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use UEC\MediaBundle\FileSystem\FileInfoInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

class MediaUploadEvent extends Event
{
    /**
     * @var \UEC\MediaBundle\Model\MediaProviderInterface
     */
    private $mediaProvider;

    /**
     * @var mixed
     */
    private $uploadedResult;

    function __construct(MediaProviderInterface $mediaProvider, $uploadedResult)
    {
        $this->mediaProvider = $mediaProvider;
        $this->uploadedResult = $uploadedResult;
    }

    /**
     * @return \UEC\MediaBundle\Model\MediaProviderInterface
     */
    public function getMediaProvider()
    {
        return $this->mediaProvider;
    }

    /**
     * @return mixed
     */
    public function getUploadedResult()
    {
        return $this->uploadedResult;
    }
}