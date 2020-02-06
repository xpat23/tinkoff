<?php

namespace Xpat\TinkoffBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class XpatTinkoffExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter("tinkoff_terminal_key",$config['terminal_key']);
        $container->setParameter("tinkoff_password",$config['password']);
        $container->setParameter("tinkoff_api_url",$config['api_url']);
        $container->setParameter("tinkoff_notification_route",$config['notification_route'] ?? null);
        $container->setParameter("tinkoff_success_route",$config['success_route'] ?? null);
        $container->setParameter("tinkoff_fail_route",$config['fail_route'] ?? null);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
