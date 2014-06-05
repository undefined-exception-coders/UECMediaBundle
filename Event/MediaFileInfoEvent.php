<?php

namespace UEC\MediaBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use UEC\MediaBundle\FileSystem\FileInfoInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

class MediaFileInfoEvent extends Event
{
    /**
     * @var \UEC\MediaBundle\Model\MediaProviderInterface
     */
    private $mediaProvider;

    /**
     * @var \UEC\MediaBundle\FileSystem\FileInfoInterface
     */
    private $fileInfo;

    function __construct(MediaProviderInterface $mediaProvider, FileInfoInterface $fileInfo)
    {
        $this->mediaProvider = $mediaProvider;
        $this->fileInfo = $fileInfo;
    }

    /**
     * @return \UEC\MediaBundle\Model\MediaProviderInterface
     */
    public function getMediaProvider()
    {
        return $this->mediaProvider;
    }

    /**
     * @return \UEC\MediaBundle\FileSystem\FileInfoInterface
     */
    public function getFileInfo()
    {
        return $this->fileInfo;
    }
}