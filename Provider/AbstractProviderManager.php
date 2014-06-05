<?php

namespace UEC\MediaBundle\Provider;

use UEC\MediaBundle\CDN\CDNInterface;
use UEC\MediaBundle\FileSystem\FileSystemInterface;
use UEC\MediaBundle\Form\FormProcessorInterface;
use UEC\MediaBundle\Model\MediaProviderManagerInterface;

abstract class AbstractProviderManager implements ProviderManagerInterface
{
    /**
     * @var \UEC\MediaBundle\CDN\CDNInterface
     */
    protected $cdn;

    /**
     * @var \UEC\MediaBundle\FileSystem\FileSystemInterface
     */
    protected $fileSystem;

    /**
     * @var string
     */
    protected $formName;

    /**
     * @var \UEC\MediaBundle\Form\FormProcessorInterface
     */
    protected $formProcessor;

    /**
     * @var \UEC\MediaBundle\Model\MediaProviderManagerInterface
     */
    protected $mediaProviderManager;

    function __construct(CDNInterface $cdn, FileSystemInterface $fileSystem, $formName, FormProcessorInterface $formProcessor, MediaProviderManagerInterface $mediaProviderManager)
    {
        $this->cdn = $cdn;
        $this->fileSystem = $fileSystem;
        $this->formName = $formName;
        $this->formProcessor = $formProcessor;
        $this->mediaProviderManager = $mediaProviderManager;
    }

    /**
     * Get instance of cdn
     *
     * @return \UEC\MediaBundle\CDN\CDNInterface
     */
    public function getCdn()
    {
        return $this->cdn;
    }

    /**
     * Get instance of file system
     *
     * @return \UEC\MediaBundle\FileSystem\FileSystemInterface
     */
    public function getFileSystem()
    {
        return $this->fileSystem;
    }

    /**
     * Get the form name
     *
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }

    /**
     * Get instance of form processor
     *
     * @return \UEC\MediaBundle\Form\FormProcessorInterface
     */
    public function getFormProcessor()
    {
        return $this->formProcessor;
    }

    /**
     * Get instance of media manager
     *
     * @return \UEC\MediaBundle\Model\MediaProviderManagerInterface
     */
    public function getMediaProviderManager()
    {
        return $this->mediaProviderManager;
    }
}