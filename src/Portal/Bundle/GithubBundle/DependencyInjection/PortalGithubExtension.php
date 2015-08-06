<?php

namespace Portal\Bundle\GithubBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class PortalGithubExtension
 *
 * @package Portal\Bundle\GithubBundle\DependencyInjection
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class PortalGithubExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        $container->setParameter('github_api.cache_dir', $config['cache']['dir']);
    }
}