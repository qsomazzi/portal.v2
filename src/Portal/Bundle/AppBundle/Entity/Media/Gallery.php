<?php

namespace Portal\Bundle\AppBundle\Entity\Media;

use Sonata\MediaBundle\Entity\BaseGallery;

/**
 * Class Gallery.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Gallery extends BaseGallery
{
    /**
     * @var int
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
