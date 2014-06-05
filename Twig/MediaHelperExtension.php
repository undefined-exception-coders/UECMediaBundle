<?php

namespace UEC\MediaBundle\Twig;

use UEC\MediaBundle\CDN\CDNManager;
use UEC\MediaBundle\Model\MediaCommonInterface;

class MediaHelperExtension extends \Twig_Extension
{
    /**
     * @var \UEC\MediaBundle\CDN\CDNManager
     */
    protected $CDNManager;

    function __construct(CDNManager $CDNManager)
    {
        $this->CDNManager = $CDNManager;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('thumb', array($this, 'getThumbFilter')),
            new \Twig_SimpleFilter('path', array($this, 'getPathFilter')),
            new \Twig_SimpleFilter('content', array($this, 'getContentFilter'), array('is_safe' => array('html'))),
        );
    }

    public function getThumbFilter(MediaCommonInterface $media)
    {
        return $this->CDNManager->media($media)->getThumbPath();
    }

    public function getPathFilter(MediaCommonInterface $media)
    {
        return $this->CDNManager->media($media)->getFilePath();
    }

    public function getContentFilter(MediaCommonInterface $media, array $options = array())
    {
        return $this->CDNManager->media($media)->getContent($options);
    }

    public function getName()
    {
        return 'uec_media_helper';
    }
} 