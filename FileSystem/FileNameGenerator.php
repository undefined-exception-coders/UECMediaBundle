<?php

namespace UEC\MediaBundle\FileSystem;

use UEC\MediaBundle\Model\MediaProviderInterface;

class FileNameGenerator implements FileNameGeneratorInterface
{
    /**
     * Generate filename
     *
     * @param FileInfoInterface $fileInfo
     * @param MediaProviderInterface $mediaProvider
     * @return string
     */
    public function generate(FileInfoInterface $fileInfo, MediaProviderInterface $mediaProvider)
    {
        $ext = pathinfo($fileInfo->getName(), PATHINFO_EXTENSION);
        return md5(uniqid()).'.'.$ext;
    }
} 