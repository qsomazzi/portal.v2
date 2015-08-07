<?php

namespace Portal\Bundle\GithubBundle\DependencyInjection;

use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class PortalGithubExtension.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class PortalGithubExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('orm.xml');

        $this->registerParameters($container, $config);
        $this->registerDoctrineMapping($config);
    }

    /**
     * Registers service parameters from bundle configuration.
     *
     * @param ContainerBuilder $container Container builder
     * @param array            $config    Array of configuration
     */
    public function registerParameters(ContainerBuilder $container, array $config)
    {
        $container->setParameter('github_api.cache_dir', $config['cache']);
        $container->setParameter('github_api.token', $config['token']);
    }

    /**
     * Registers doctrine mapping on concrete page entities.
     *
     * @param array $config
     */
    public function registerDoctrineMapping(array $config)
    {
        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['gist'], 'mapManyToMany', [
            'fieldName'       => 'tags',
            'targetEntity'    => $config['class']['tag'],
            'cascade'         => [],
            'joinTable'       => [
                'name'        => 'github__gist__tag',
                'joinColumns' => [
                    [
                        'name'                 => 'gist_id',
                        'referencedColumnName' => 'id',
                        'onDelete'             => 'CASCADE',
                    ],
                ],
                'inverseJoinColumns' => [[
                    'name'                 => 'tag_id',
                    'referencedColumnName' => 'id',
                    'onDelete'             => 'CASCADE',
                ]],
            ],
        ]);
    }
}
