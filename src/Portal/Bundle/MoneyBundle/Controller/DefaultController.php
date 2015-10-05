<?php

namespace Portal\Bundle\MoneyBundle\Controller;

use Portal\Bundle\AppBundle\Entity\Classification\Category;
use Portal\Bundle\MoneyBundle\Entity\CategoryManager;
use Portal\Bundle\MoneyBundle\Entity\TransactionManager;
use Portal\Component\Core\Controller\SonataController;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Sonata\AdminBundle\Admin\Pool;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

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
     * @var TransactionManager
     */
    protected $transactionManager;

    /**
     * @var Serializer
     */
    protected $serializer;


    /**
     * @param Pool               $adminPool
     * @param EngineInterface    $templating
     * @param CategoryManager    $categoryManager
     * @param TransactionManager $transactionManager
     */
    public function __construct(Pool $adminPool, EngineInterface $templating, CategoryManager $categoryManager, TransactionManager $transactionManager)
    {
        parent::__construct($adminPool, $templating);

        $this->categoryManager    = $categoryManager;
        $this->transactionManager = $transactionManager;

        $normalizer = new GetSetMethodNormalizer();
        $normalizer->setIgnoredAttributes(['category']);

        $this->serializer = new Serializer([$normalizer], [new JsonEncoder()]);
    }

    /**
     * Return categories for the MoneyApp
     */
    public function moneyAction()
    {
        return $this->render('PortalMoneyBundle:Default:money.html.twig');
    }

    /**
     * Return categories for the MoneyApp
     */
    public function transactionsAction(Category $category)
    {
        $transactions = $this->transactionManager->findBy(['category' => $category]);

        return new Response($this->serializer->serialize($transactions, 'json'), 200, ['content-type' => 'application/json']);
    }

    /**
     * Return categories for the MoneyApp
     */
    public function categoriesAction()
    {
        $categories = $this->categoryManager->getMoneyCategories();

        return new JsonResponse($categories);
    }
}
