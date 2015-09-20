<?php

namespace Portal\Bundle\MoneyBundle\Controller;

use Portal\Bundle\MoneyBundle\Entity\CategoryManager;
use Portal\Component\Core\Controller\SonataController;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Sonata\AdminBundle\Admin\Pool;

/**
 * Class DefaultController.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class DefaultController extends SonataController
{
    /**
     * @var CategoryManager
     */
    protected $categoryManager;

    /**
     * @param Pool            $adminPool
     * @param EngineInterface $templating
     * @param CategoryManager $categoryManager
     */
    public function __construct(Pool $adminPool, EngineInterface $templating, CategoryManager $categoryManager)
    {
        parent::__construct($adminPool, $templating);

        $this->categoryManager = $categoryManager;
    }

    /**
     * Return categories for the MoneyApp
     */
    public function moneyAction()
    {
        $categories = $this->categoryManager->getMoneyCategories();

        return $this->render('PortalMoneyBundle:Default:money.html.twig', [
            'categories' => $categories
        ]);
    }
}
