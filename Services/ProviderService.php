<?php

namespace UEC\MediaBundle\Services;

use Symfony\Component\DependencyInjection\ContainerInterface;
use UEC\MediaBundle\Provider\ProviderManagerInterface;

class ProviderService
{
    /**
     * @var \Symfony\Component\DependencyInjection\ContainerInterface
     */
    protected $container;

    /**
     * @var array
     */
    protected $contexts;

    function __construct(ContainerInterface $container, array $contexts)
    {
        $this->container = $container;
        $this->contexts = $contexts;
    }

    /**
     * @param $context
     * @return ProviderManagerInterface
     * @throws \Exception
     */
    public function getProviderManager($context)
    {
        if (!array_key_exists($context, $this->contexts)) {
            throw new \Exception('Context not found');
        }

        return $this->container->get($this->contexts[$context]['id']);
    }
} 