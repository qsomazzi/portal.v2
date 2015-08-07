<?php

namespace Portal\Bundle\AppBundle\Controller;

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
     */
    public function warZoneAction()
    {
        $github = $this->container->get('github_api');

        return $this->render('PortalAppBundle:Default:war_zone.html.twig', [
            'repositories' => $github->getRepositories(),
        ]);
    }
}
