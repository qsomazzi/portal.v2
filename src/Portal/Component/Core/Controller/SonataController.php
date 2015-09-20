<?php

namespace Portal\Component\Core\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Admin\Pool;

/**
 * Class SonataController.
 *
 * @author Quentin Somazzi <qsomazzi@gmail.com>
 */
abstract class SonataController extends Controller
{
    /**
     * @var EngineInterface
     */
    protected $templating;

    /**
     * @var Pool
     */
    protected $adminPool;

    /**
     * @param Pool            $adminPool
     * @param EngineInterface $templating
     */
    public function __construct(Pool $adminPool, EngineInterface $templating)
    {
        $this->adminPool  = $adminPool;
        $this->templating = $templating;
    }

    /**
     * {@inheritDoc}
     */
    public function render($template, array $parameters = [], Response $response = null)
    {
        $defaultParameters = ['admin_pool' => $this->adminPool];

        return $this->templating->renderResponse($template, array_merge($defaultParameters, $parameters));
    }
}
