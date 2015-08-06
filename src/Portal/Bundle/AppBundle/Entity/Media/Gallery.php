<?php

namespace Portal\Bundle\AppBundle\Entity\Media;

use Sonata\MediaBundle\Entity\BaseGallery;

/**
 * Class Gallery
 *
 * @package Portal\Bundle\AppBundle\Entity\Media
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Gallery extends BaseGallery
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
