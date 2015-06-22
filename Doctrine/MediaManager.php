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
     * @param boolean $andFlush
     */
    protected function doSaveMedia(MediaInterface $media, $andFlush = true)
    {
        $this->em->persist($media);
        if ($andFlush) {
            $this->em->flush($media);
        }
    }
}