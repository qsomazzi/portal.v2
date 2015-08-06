<?php

namespace Portal\Bundle\GithubBundle\Tests\DependencyInjection;

use Portal\Bundle\GithubBundle\DependencyInjection\PortalGithubExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class PortalGithubExtensionTest
 *
 * @package Portal\Bundle\GithubBundle\Tests\DependencyInjection
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class PortalGithubExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param array $config
     *
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    protected function getBuilder(array $config = [])
    {
        $builder = new ContainerBuilder();

        $loader = new PortalGithubExtension();
        $loader->load($config, $builder);

        return $builder;
    }

    public function testLoadDefault()
    {
        $builder = $this->getBuilder();

        $this->assertFalse($builder->getParameter('github_api.cache_dir'));
    }

    public function testLoadConfiguredDir()
    {
        $config = [
            [
                'cache' => [
                    'dir' => '/tmp/github-api-cache-test',
                ]
            ]
        ];

        $builder = $this->getBuilder($config);

        $this->assertEquals('/tmp/github-api-cache-test', $builder->getParameter('github_api.cache_dir'));
    }
}