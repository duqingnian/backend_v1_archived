<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_multi_excel_item")
 */
class MultiExcelItem
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
    private $excel_id = 0;
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $name=""; //姓名
	
	/**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $amount = 0.00; //金额
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $card_no=""; //卡号
	
	/**
     * @ORM\Column(type="string", length=30)
     */
    private $bank_name=""; //银行名称
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $bank_branch=""; //支行
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $status=""; //processing处理中   done处理完成  空白为等待处理
	
	/**
     * @ORM\Column(type="integer")
     */
    private $order_id = 0; //关联订单号
	
	/**
     * @ORM\Column(type="text")
     */
    private $post_data="";
	
	/**
     * @ORM\Column(type="text")
     */
    private $api_data="";

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
     * Set excelId
     *
     * @param integer $excelId
     *
     * @return MultiExcelItem
     */
    public function setExcelId($excelId)
    {
        $this->excel_id = $excelId;

        return $this;
    }

    /**
     * Get excelId
     *
     * @return integer
     */
    public function getExcelId()
    {
        return $this->excel_id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return MultiExcelItem
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
     * Set amount
     *
     * @param string $amount
     *
     * @return MultiExcelItem
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set cardNo
     *
     * @param string $cardNo
     *
     * @return MultiExcelItem
     */
    public function setCardNo($cardNo)
    {
        $this->card_no = $cardNo;

        return $this;
    }

    /**
     * Get cardNo
     *
     * @return string
     */
    public function getCardNo()
    {
        return $this->card_no;
    }

    /**
     * Set bankName
     *
     * @param string $bankName
     *
     * @return MultiExcelItem
     */
    public function setBankName($bankName)
    {
        $this->bank_name = $bankName;

        return $this;
    }

    /**
     * Get bankName
     *
     * @return string
     */
    public function getBankName()
    {
        return $this->bank_name;
    }

    /**
     * Set bankBranch
     *
     * @param string $bankBranch
     *
     * @return MultiExcelItem
     */
    public function setBankBranch($bankBranch)
    {
        $this->bank_branch = $bankBranch;

        return $this;
    }

    /**
     * Get bankBranch
     *
     * @return string
     */
    public function getBankBranch()
    {
        return $this->bank_branch;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return MultiExcelItem
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
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return MultiExcelItem
     */
    public function setOrderId($orderId)
    {
        $this->order_id = $orderId;

        return $this;
    }

    /**
     * Get orderId
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Set postData
     *
     * @param string $postData
     *
     * @return MultiExcelItem
     */
    public function setPostData($postData)
    {
        $this->post_data = $postData;

        return $this;
    }

    /**
     * Get postData
     *
     * @return string
     */
    public function getPostData()
    {
        return $this->post_data;
    }

    /**
     * Set apiData
     *
     * @param string $apiData
     *
     * @return MultiExcelItem
     */
    public function setApiData($apiData)
    {
        $this->api_data = $apiData;

        return $this;
    }

    /**
     * Get apiData
     *
     * @return string
     */
    public function getApiData()
    {
        return $this->api_data;
    }
}
