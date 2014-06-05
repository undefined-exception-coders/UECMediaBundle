<?php

namespace UEC\MediaBundle\Doctrine;

use Doctrine\ORM\EntityManager;
use UEC\MediaBundle\Model\MediaInterface;
use UEC\MediaBundle\Model\MediaManager as BaseMediaManager;

class MediaManager extends BaseMediaManager
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var string
     */
    protected $className;

    function __construct(EntityManager $em, $className)
    {
        $this->em = $em;
        $this->className = $className;
    }

    /**
     * Returns the media's fully qualified class name.
     *
     * @return string
     */
    public function getClass()
    {
        return $this->className;
    }

    /**
     * @param MediaInterface $media
     */
    protected function doSaveMedia(MediaInterface $media)
    {
        $this->em->persist($media);
        $this->em->flush();
    }
}