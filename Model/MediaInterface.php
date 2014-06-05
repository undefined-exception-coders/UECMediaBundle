<?php

namespace UEC\MediaBundle\Model;

interface MediaInterface extends MediaCommonInterface
{
    /**
     * Get id
     *
     * @return int
     */
    public function getId();

    /**
     * Set context
     *
     * @param string $context
     * @return MediaInterface
     */
    public function setContext($context);

    /**
     * Get context
     *
     * @return string
     */
    public function getContext();

    /**
     * Set name
     *
     * @param string $name
     * @return MediaInterface
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set path
     *
     * @param string $path
     * @return MediaInterface
     */
    public function setPath($path);

    /**
     * Get path
     *
     * @return string
     */
    public function getPath();

    /**
     * Set file
     *
     * @param mixed $file
     * @return MediaInterface
     */
    public function setFile($file);

    /**
     * Get file
     *
     * @return mixed
     */
    public function getFile();
} 