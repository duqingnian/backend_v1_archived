<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_dispatch")
 */
class Dispatch
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
	/**
     * @ORM\Column(type="string", length=12)
     */
    private $bundle=""; // TOPUP充值   WITHDRAWAL提现
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $old_money = 0.00; //操作 之前的 费用
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $money = 0.00; //操作费用
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $new_money = 0.00; //操作 之后的 费用
	
	/**
     * @ORM\Column(type="integer")
     */
    private $uid = 0; //操作人
	
	/**
     * @ORM\Column(type="integer")
     */
    private $shanghu_id = 0; //商户id
	
	/**
     * @ORM\Column(type="string", length=200)
     */
    private $note = ""; //备注
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $status = ""; //状态
	
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
     * Set bundle
     *
     * @param string $bundle
     *
     * @return Dispatch
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set money
     *
     * @param string $money
     *
     * @return Dispatch
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set uid
     *
     * @param integer $uid
     *
     * @return Dispatch
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
     * Set shanghuId
     *
     * @param integer $shanghuId
     *
     * @return Dispatch
     */
    public function setShanghuId($shanghuId)
    {
        $this->shanghu_id = $shanghuId;

        return $this;
    }

    /**
     * Get shanghuId
     *
     * @return integer
     */
    public function getShanghuId()
    {
        return $this->shanghu_id;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Dispatch
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Dispatch
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set createdAt
     *
     * @param integer $createdAt
     *
     * @return Dispatch
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
     * Set oldMoney
     *
     * @param string $oldMoney
     *
     * @return Dispatch
     */
    public function setOldMoney($oldMoney)
    {
        $this->old_money = $oldMoney;

        return $this;
    }

    /**
     * Get oldMoney
     *
     * @return string
     */
    public function getOldMoney()
    {
        return $this->old_money;
    }

    /**
     * Set newMoney
     *
     * @param string $newMoney
     *
     * @return Dispatch
     */
    public function setNewMoney($newMoney)
    {
        $this->new_money = $newMoney;

        return $this;
    }

    /**
     * Get newMoney
     *
     * @return string
     */
    public function getNewMoney()
    {
        return $this->new_money;
    }
}
