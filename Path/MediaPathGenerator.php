<?php

namespace UEC\MediaBundle\Path;

use UEC\MediaBundle\Model\MediaProviderInterface;

class MediaPathGenerator extends AbstractPathGenerator
{
    /**
     * Generate path for Media
     *
     * @param MediaProviderInterface $mediaProvider
     * @return string
     */
    public function generate(MediaProviderInterface $mediaProvider)
    {
        $path = rtrim($this->basePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR .
                $mediaProvider->getMedia()->getContext() . DIRECTORY_SEPARATOR .
                date('Y') . DIRECTORY_SEPARATOR .
                date('m') . DIRECTORY_SEPARATOR .
                date('d')
        ;

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        return $path;
    }
} 