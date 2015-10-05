<?php

namespace Portal\Bundle\MoneyBundle\Entity;

use Portal\Bundle\AppBundle\Entity\Classification\Category;

/**
 * Class Transaction.
 *
 * @author Quentin Somazzi <qsomazzi@gmail.com>
 */
class Transaction
{
    const ACCOUNT_DEPOT   = 1;
    const ACCOUNT_EPARGNE = 2;
    const ACCOUNT_LIVRETA = 3;
    const ACCOUNT_LIVRETJ = 4;
    const ACCOUNT_COMMON  = 5;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $intitule;

    /**
     * @var \Datetime
     */
    protected $date;

    /**
     * @var integer
     */
    protected $account;

    /**
     * @var float
     */
    protected $price;

    /**
     * @var string
     */
    protected $note;

    /**
     * @var Category
     */
    protected $category;

    public function __construct()
    {
        $this->account = 1;
        $this->date    = new \DateTime;
        $this->note    = null;
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
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     *
     * @return $this
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     *
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param int $account
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     *
     * @return $this
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     *
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets account types
     *
     * @return array
     */
    public static function getAccountTypes()
    {
        return [
            self::ACCOUNT_DEPOT   => 'Compte De Dépôts',
            self::ACCOUNT_EPARGNE => 'Plan D\'Épargne Logement',
            self::ACCOUNT_LIVRETA => 'Livret A',
            self::ACCOUNT_LIVRETJ => 'Livret Jeune',
            self::ACCOUNT_COMMON  => 'Compte Commun',
        ];
    }
}
