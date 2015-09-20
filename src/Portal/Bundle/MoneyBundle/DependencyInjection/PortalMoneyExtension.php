<?php

namespace Portal\Bundle\MoneyBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class PortalMoneyExtension.
 *
 * @author Quentin Somazzi <qsomazzi@gmail.com>
 */
class PortalMoneyExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('controller.xml');
        $loader->load('orm.xml');
    }
}
