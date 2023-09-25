<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_shanghu")
 */
class Shanghu
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
	/**
     * @ORM\Column(type="integer")
     */
    private $uid = 0;
	
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name; //名称
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $country; //国家
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $balance = 0.00; //余额
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $df_pool = 0; //代付金额
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $freeze_pool = 0; //冻结金额
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_active = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $is_test = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $created_at = 0;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Shanghu
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     *
     * @return Shanghu
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return Shanghu
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return integer
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Shanghu
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set balance
     *
     * @param string $balance
     *
     * @return Shanghu
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set dfPool
     *
     * @param string $dfPool
     *
     * @return Shanghu
     */
    public function setDfPool($dfPool)
    {
        $this->df_pool = $dfPool;

        return $this;
    }

    /**
     * Get dfPool
     *
     * @return string
     */
    public function getDfPool()
    {
        return $this->df_pool;
    }

    /**
     * Set freezePool
     *
     * @param string $freezePool
     *
     * @return Shanghu
     */
    public function setFreezePool($freezePool)
    {
        $this->freeze_pool = $freezePool;

        return $this;
    }

    /**
     * Get freezePool
     *
     * @return string
     */
    public function getFreezePool()
    {
        return $this->freeze_pool;
    }

    /**
     * Set isTest
     *
     * @param integer $isTest
     *
     * @return Shanghu
     */
    public function setIsTest($isTest)
    {
        $this->is_test = $isTest;

        return $this;
    }

    /**
     * Get isTest
     *
     * @return integer
     */
    public function getIsTest()
    {
        return $this->is_test;
    }

    /**
     * Set uid
     *
     * @param integer $uid
     *
     * @return Shanghu
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }
}
