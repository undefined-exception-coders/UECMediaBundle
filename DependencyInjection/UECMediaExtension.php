<?php

namespace UEC\MediaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class UECMediaExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load(sprintf('%s.xml', $config['db_driver']));

        $container->setParameter('uec_media.db_driver', $config['db_driver']);
        $container->setParameter('uec_media.path_generator.base_path', $config['path_generator']['base_path']);
        $container->setParameter('uec_media.model.class', $config['model']);
        $container->setParameter('uec_media.contexts', $config['contexts']);

        $container->setAlias('uec_media.model_manager', $config['model_manager']);
        $container->setAlias('uec_media.path_generator', $config['path_generator']['id']);
        $container->setAlias('uec_media.manager', 'uec_media.services.media_manager');
        $container->setAlias('uec_media.file_name_generator', $config['file_name_generator']);

        $loader->load('cdn.xml');
        $loader->load('file_system.xml');
        $loader->load('form.xml');
        $loader->load('path.xml');
        $loader->load('resolver.xml');
        $loader->load('services.xml');
        $loader->load('twig.xml');
    }
}
