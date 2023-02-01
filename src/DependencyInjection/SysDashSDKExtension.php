<?php

namespace Mubiridziri\Sysdashsdk\DependencyInjection;

use Mubiridziri\Sysdashsdk\Manager\Manager;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class SysDashSDKExtension extends Extension
{

    public function load(array $configs, ContainerBuilder $container)
    {
        $configDir = new FileLocator(__DIR__ . '/../Resources/config');

        $loader = new YamlFileLoader($container, $configDir);
        $loader->load('services.yaml');

        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $manager = $container->getDefinition(Manager::class);
        $manager->replaceArgument(0, $config['address']);
        $manager->replaceArgument(1, $config['token']);
    }
}