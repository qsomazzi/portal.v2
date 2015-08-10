<?php

namespace Portal\Bundle\GithubBundle\Entity;

/**
 * Class Repository.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Repository
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var bool
     */
    protected $fork;

    /**
     * @var bool
     */
    protected $public;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->fork   = false;
        $this->public = true;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return bool
     */
    public function isFork()
    {
        return $this->fork;
    }

    /**
     * @param bool $fork
     *
     * @return $this
     */
    public function setFork($fork)
    {
        $this->fork = $fork;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPublic()
    {
        return $this->public;
    }

    /**
     * @param bool $public
     *
     * @return $this
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }
}
