<?php

namespace Shapecode\Bundle\TwigDoctrineLoaderBundle\DependencyInjection;

use Shapecode\Bundle\TwigDoctrineLoaderBundle\Entity\Template;
use Shapecode\Bundle\TwigDoctrineLoaderBundle\Entity\TemplateInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class ShapecodeTwigDoctrineLoaderExtension
 *
 * @package Shapecode\Bundle\TwigStringLoaderBundle\DependencyInjection
 * @author  Nikita Loges
 */
class ShapecodeTwigDoctrineLoaderExtension extends Extension implements PrependExtensionInterface
{

    /**
     * @inheritdoc
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * @inheritdoc
     */
    public function prepend(ContainerBuilder $container)
    {
        $container->prependExtensionConfig('doctrine', [
            'orm' => [
                'resolve_target_entities' => [
                    TemplateInterface::class => Template::class,
                ]
            ]
        ]);
    }
}
