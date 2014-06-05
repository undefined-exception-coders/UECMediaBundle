<?php

namespace UEC\MediaBundle\Provider;

interface ProviderManagerInterface
{
    /**
     * Get instance of cdn
     *
     * @return \UEC\MediaBundle\CDN\CDNInterface
     */
    public function getCdn();

    /**
     * Get instance of file system
     *
     * @return \UEC\MediaBundle\FileSystem\FileSystemInterface
     */
    public function getFileSystem();

    /**
     * Get instance of form factory
     *
     * @return string
     */
    public function getFormName();

    /**
     * Get instance of form processor
     *
     * @return \UEC\MediaBundle\Form\FormProcessorInterface
     */
    public function getFormProcessor();

    /**
     * Get instance of media manager
     *
     * @return \UEC\MediaBundle\Model\MediaProviderManagerInterface
     */
    public function getMediaProviderManager();
}