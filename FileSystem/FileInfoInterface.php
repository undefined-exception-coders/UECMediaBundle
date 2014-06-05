<?php

namespace UEC\MediaBundle\FileSystem;

interface FileInfoInterface
{
    public function getTmpName();

    public function getName();

    public function getSize();

    public function getType();

    public function getError();

    /**
     * This method must return true if the file is coming from $_FILES, or false instead.
     *
     * @return bool
     */
    public function isUploadedFile();
} 