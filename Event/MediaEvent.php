<?php

namespace UEC\MediaBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use UEC\MediaBundle\FileSystem\FileInfoInterface;
use UEC\MediaBundle\Model\MediaProviderInterface;

class MediaEvent extends Event
{
    /**
     * @var \UEC\MediaBundle\Model\MediaProviderInterface
     */
    private $mediaProvider;

    function __construct(MediaProviderInterface $mediaProvider)
    {
        $this->mediaProvider = $mediaProvider;
    }

    /**
     * @return \UEC\MediaBundle\Model\MediaProviderInterface
     */
    public function getMediaProvider()
    {
        return $this->mediaProvider;
    }
}