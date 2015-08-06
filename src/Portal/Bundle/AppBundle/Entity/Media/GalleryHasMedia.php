<?php

namespace Portal\Bundle\AppBundle\Entity\Media;

use Sonata\MediaBundle\Entity\BaseGalleryHasMedia;

/**
 * Class GalleryHasMedia
 *
 * @package Portal\Bundle\AppBundle\Entity\Media
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GalleryHasMedia extends BaseGalleryHasMedia
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
