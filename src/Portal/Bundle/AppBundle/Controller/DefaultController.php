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
        $service = $this->container->get('github_api');
        $client  = $service->getClient();

        return $this->render('PortalAppBundle:Default:war_zone.html.twig', [
            'repositories' => $client->api('user')->repositories('qsomazzi'),
            'gists'        => $client->api('gists')->all(),
        ]);
    }
}
