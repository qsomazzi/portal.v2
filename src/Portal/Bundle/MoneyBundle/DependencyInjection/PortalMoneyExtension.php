<?php

namespace Portal\Bundle\MoneyBundle\DependencyInjection;

use Sonata\EasyExtendsBundle\Mapper\DoctrineCollector;
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
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('controller.xml');
        $loader->load('orm.xml');

        $this->registerDoctrineMapping($config);
    }

    /**
     * Registers doctrine mapping on concrete page entities.
     *
     * @param array $config
     */
    public function registerDoctrineMapping(array $config)
    {
        $collector = DoctrineCollector::getInstance();

        $collector->addAssociation($config['class']['transaction'], 'mapManyToOne', array(
            'fieldName'    => 'category',
            'targetEntity' => $config['class']['category'],
            'cascade'      => array(
                'persist',
            ),
            'joinColumns' => array(
                array(
                    'name'                 => 'category_id',
                    'referencedColumnName' => 'id',
                    'onDelete'             => 'CASCADE',
                ),
            ),
            'orphanRemoval' => false,
        ));
    }
}
