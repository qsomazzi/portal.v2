<?php

namespace Portal\Bundle\GithubBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Tag.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Tag
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $color;

    /**
     * @var string
     */
    protected $icon;

    /**
     * @var Gist[]
     */
    protected $gists;

    public function __construct()
    {
        $this->color = 'info';
        $this->gists = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param string $color
     *
     * @return $this
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     *
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return Gist[]
     */
    public function getGists()
    {
        return $this->gists;
    }

    /**
     * @param Gist[] $gists
     *
     * @return $this
     */
    public function setGists(array $gists)
    {
        $this->gists = $gists;

        return $this;
    }
}
