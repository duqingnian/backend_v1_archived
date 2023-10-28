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
    private $category = 0;
	
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
     * @ORM\Column(type="integer")
     */
    private $payin_min = 1;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payin_max = 9999999; //1000万
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_min = 10;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_max = 9999; //9999
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payin_review_switch = 0; //代收是否开启人工审核
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_review_switch = 0; //代付是否开启人工审核
	
	/**
     * @ORM\Column(type="integer")
     */
    private $payout_require_review_number = 0; //代付 大于多少金额 开启人工审核,0不开启

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

    /**
     * Set payinMin
     *
     * @param integer $payinMin
     *
     * @return Shanghu
     */
    public function setPayinMin($payinMin)
    {
        $this->payin_min = $payinMin;

        return $this;
    }

    /**
     * Get payinMin
     *
     * @return integer
     */
    public function getPayinMin()
    {
        return $this->payin_min;
    }

    /**
     * Set payinMax
     *
     * @param integer $payinMax
     *
     * @return Shanghu
     */
    public function setPayinMax($payinMax)
    {
        $this->payin_max = $payinMax;

        return $this;
    }

    /**
     * Get payinMax
     *
     * @return integer
     */
    public function getPayinMax()
    {
        return $this->payin_max;
    }

    /**
     * Set payoutMin
     *
     * @param integer $payoutMin
     *
     * @return Shanghu
     */
    public function setPayoutMin($payoutMin)
    {
        $this->payout_min = $payoutMin;

        return $this;
    }

    /**
     * Get payoutMin
     *
     * @return integer
     */
    public function getPayoutMin()
    {
        return $this->payout_min;
    }

    /**
     * Set payoutMax
     *
     * @param integer $payoutMax
     *
     * @return Shanghu
     */
    public function setPayoutMax($payoutMax)
    {
        $this->payout_max = $payoutMax;

        return $this;
    }

    /**
     * Get payoutMax
     *
     * @return integer
     */
    public function getPayoutMax()
    {
        return $this->payout_max;
    }

    /**
     * Set payinReviewSwitch
     *
     * @param integer $payinReviewSwitch
     *
     * @return Shanghu
     */
    public function setPayinReviewSwitch($payinReviewSwitch)
    {
        $this->payin_review_switch = $payinReviewSwitch;

        return $this;
    }

    /**
     * Get payinReviewSwitch
     *
     * @return integer
     */
    public function getPayinReviewSwitch()
    {
        return $this->payin_review_switch;
    }

    /**
     * Set payoutReviewSwitch
     *
     * @param integer $payoutReviewSwitch
     *
     * @return Shanghu
     */
    public function setPayoutReviewSwitch($payoutReviewSwitch)
    {
        $this->payout_review_switch = $payoutReviewSwitch;

        return $this;
    }

    /**
     * Get payoutReviewSwitch
     *
     * @return integer
     */
    public function getPayoutReviewSwitch()
    {
        return $this->payout_review_switch;
    }

    /**
     * Set payoutRequireReviewNumber
     *
     * @param integer $payoutRequireReviewNumber
     *
     * @return Shanghu
     */
    public function setPayoutRequireReviewNumber($payoutRequireReviewNumber)
    {
        $this->payout_require_review_number = $payoutRequireReviewNumber;

        return $this;
    }

    /**
     * Get payoutRequireReviewNumber
     *
     * @return integer
     */
    public function getPayoutRequireReviewNumber()
    {
        return $this->payout_require_review_number;
    }

    /**
     * Set category
     *
     * @param integer $category
     *
     * @return Shanghu
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer
     */
    public function getCategory()
    {
        return $this->category;
    }
}
