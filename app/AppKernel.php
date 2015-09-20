<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Class AppKernel.
 *
 * @author Quentin Somazzi <qsomazzi@gmail.com>
 */
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Public bundles
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new Cocur\Slugify\Bridge\Symfony\CocurSlugifyBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            // Sonata bundles
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Sonata\NotificationBundle\SonataNotificationBundle(),
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new Sonata\PageBundle\SonataPageBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\FormatterBundle\SonataFormatterBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Sonata\ClassificationBundle\SonataClassificationBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),

            // Projects bundles
            new Portal\Bundle\AppBundle\PortalAppBundle(),
            new Portal\Bundle\GithubBundle\PortalGithubBundle(),
            new Portal\Bundle\MoneyBundle\PortalMoneyBundle(),
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'])) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir() . '/config/config_' . $this->getEnvironment() . '.yml');
    }
}
