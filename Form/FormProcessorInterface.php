<?php

namespace UEC\MediaBundle\Form;

use UEC\MediaBundle\FileSystem\FileInfoInterface;

interface FormProcessorInterface
{
    /**
     * Parse the MediaInterface::getFile() and return an instance of FileInfoInterface
     *
     * @param mixed $file
     * @return FileInfoInterface
     */
    public function getFileInfo($file);
} 