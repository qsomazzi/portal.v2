<?php

namespace Portal\Bundle\AppBundle\Entity\User;

use Sonata\UserBundle\Entity\BaseUser;

/**
 * Class User.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class User extends BaseUser
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
