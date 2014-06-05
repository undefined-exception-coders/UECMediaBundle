<?php

namespace UEC\MediaBundle\Path;

use UEC\MediaBundle\Model\MediaProviderInterface;

interface PathGeneratorInterface
{
    /**
     * Generate path for Media
     *
     * @param MediaProviderInterface $mediaProvider
     * @return string
     */
    public function generate(MediaProviderInterface $mediaProvider);

    /**
     * Get base path
     *
     * @return string
     */
    public function getBasePath();
}