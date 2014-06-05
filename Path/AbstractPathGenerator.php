<?php

namespace UEC\MediaBundle\Path;

abstract class AbstractPathGenerator implements PathGeneratorInterface
{
    /**
     * @var string
     */
    protected $basePath;

    function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Get base path
     *
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }
}