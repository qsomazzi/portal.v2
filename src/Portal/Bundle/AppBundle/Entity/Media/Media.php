<?php

namespace Portal\Bundle\AppBundle\Entity\Media;

use Sonata\MediaBundle\Entity\BaseMedia;

/**
 * Class Media
 *
 * @package Portal\Bundle\AppBundle\Entity\Media
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Media extends BaseMedia
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
