<?php

namespace UEC\MediaBundle\CDN;

interface CDNInterface
{
    /**
     * Return the relative thumb path
     *
     * @return mixed
     */
    public function getThumbPath();

    /**
     * Return the relative original file path
     *
     * @return mixed
     */
    public function getFilePath();

    /**
     * Get the html code
     *
     * @param array $options
     * @return mixed
     */
    public function getContent(array $options = array());
} 