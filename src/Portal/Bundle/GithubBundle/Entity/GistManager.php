<?php

namespace Portal\Bundle\GithubBundle\Entity;

use Sonata\CoreBundle\Model\BaseEntityManager;

/**
 * Class GistManager.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GistManager extends BaseEntityManager
{
    /**
     * @param array $gists
     */
    public function addGists(array $gists)
    {
        foreach ($gists as $gist) {
            if (!$gistEntity = $this->find($gist['id'])) {
                $gistEntity = new Gist();
                $gistEntity->setId($gist['id']);
            }

            $gistEntity->setDescription($gist['description']);
            $gistEntity->setPublic($gist['public']);

            $this->save($gistEntity, false);
        }

        $this->getObjectManager()->flush();
    }
}
