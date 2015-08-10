<?php

namespace Portal\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function warZoneAction()
    {
        return $this->render('PortalAppBundle:Default:war_zone.html.twig', [

        ]);
    }
}
