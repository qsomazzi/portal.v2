<?php

namespace Portal\Bundle\AppBundle\Entity\Media;

use Sonata\MediaBundle\Entity\BaseGalleryHasMedia;

/**
 * Class GalleryHasMedia.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GalleryHasMedia extends BaseGalleryHasMedia
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
