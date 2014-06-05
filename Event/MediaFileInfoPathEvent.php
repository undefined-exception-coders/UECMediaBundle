<?php

namespace UEC\MediaBundle\Event;

use UEC\MediaBundle\FileSystem\FileInfoInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

class MediaFileInfoPathEvent extends MediaFileInfoEvent
{
    /**
     * @var string
     */
    protected $filePath;

    function __construct(MediaProviderInterface $mediaProvider, FileInfoInterface $fileInfo, $filePath)
    {
        parent::__construct($mediaProvider, $fileInfo);
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}