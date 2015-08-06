<?php

namespace Portal\Bundle\AppBundle\Entity\User;

use Sonata\UserBundle\Entity\BaseGroup;

/**
 * Class Group
 *
 * @package Portal\Bundle\AppBundle\Entity\User
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Group extends BaseGroup
{
    /**
     * @var integer
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