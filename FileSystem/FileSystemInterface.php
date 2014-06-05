<?php

namespace UEC\MediaBundle\FileSystem;

use UEC\MediaBundle\Model\MediaProviderInterface;
use UEC\MediaBundle\Path\PathGeneratorInterface;

interface FileSystemInterface
{
    /**
     * Execute the upload process
     *
     * @param FileInfoInterface $fileInfo
     * @param MediaProviderInterface $mediaProvider
     * @param $filePath
     * @return mixed
     */
    public function upload(FileInfoInterface $fileInfo, MediaProviderInterface $mediaProvider, $filePath);

    /**
     * Build the file path
     *
     * @param FileInfoInterface $fileInfo
     * @param MediaProviderInterface $mediaProvider
     * @param PathGeneratorInterface $pathGenerator
     * @return mixed
     */
    public function getFilePath(FileInfoInterface $fileInfo, MediaProviderInterface $mediaProvider, PathGeneratorInterface $pathGenerator);
} 