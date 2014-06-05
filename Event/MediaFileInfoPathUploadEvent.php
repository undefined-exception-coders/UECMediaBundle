<?php

namespace UEC\MediaBundle\Event;

use UEC\MediaBundle\FileSystem\FileInfoInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

class MediaFileInfoPathUploadEvent extends MediaFileInfoPathEvent
{
    /**
     * @var mixed
     */
    private $uploadResult;

    function __construct(MediaProviderInterface $mediaProvider, FileInfoInterface $fileInfo, $filePath, $uploadResult)
    {
        parent::__construct($mediaProvider, $fileInfo, $filePath);
        $this->uploadResult = $uploadResult;
    }

    /**
     * @return mixed
     */
    public function getUploadResult()
    {
        return $this->uploadResult;
    }
}