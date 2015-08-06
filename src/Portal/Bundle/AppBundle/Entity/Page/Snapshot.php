<?php

namespace Portal\Bundle\AppBundle\Entity\Page;

use Sonata\PageBundle\Entity\BaseSnapshot;

/**
 * Class Snapshot
 *
 * @package Portal\Bundle\AppBundle\Entity\Page
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Snapshot extends BaseSnapshot
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Get id.
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
