<?php

namespace Portal\Bundle\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
    public function warZoneAction(Request $request)
    {
        $service = $this->container->get('github_api');
        $client  = $service->getClient();

        $repositories = $client->api('user')->repositories('qsomazzi');

        $gists = $client->api('gists')->all();

        echo '<pre>';
        \Doctrine\Common\Util\Debug::dump($gists);
        die();

        die('cool');
    }
}
