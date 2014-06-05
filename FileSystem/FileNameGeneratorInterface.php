<?php

namespace UEC\MediaBundle\FileSystem;

use UEC\MediaBundle\Model\MediaProviderInterface;

interface FileNameGeneratorInterface
{
    /**
     * Generate filename
     *
     * @param FileInfoInterface $fileInfo
     * @param MediaProviderInterface $mediaProvider
     * @return string
     */
    public function generate(FileInfoInterface $fileInfo, MediaProviderInterface $mediaProvider);
} 