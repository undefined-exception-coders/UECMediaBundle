<?php

namespace UEC\MediaBundle\Services;

use UEC\MediaBundle\Provider\ProviderManagerInterface;

interface ProviderServiceInterface
{
    /**
     * Return provider
     *
     * @param string $context
     * @return ProviderManagerInterface
     * @throws \Exception
     */
    public function getProviderManager($context);

    /**
     * Return contexts key
     *
     * @return array
     */
    public function getProviderContextsKey();
}