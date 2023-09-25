<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_channel_config")
 */
class ChannelConfig
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
    private $master_id = 0;
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $payin_appid = "";
	
	/**
     * @ORM\Column(type="string", length=64)
     */
    private $payin_secret = "";
	
	/**
     * @ORM\Column(type="string", length=32)
     */
    private $payout_appid = "";
	
	/**
     * @ORM\Column(type="string", length=64)
     */
    private $payout_secret = "";
	
	/**
     * @ORM\Column(type="integer")
     */
    private $in_pct = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $in_sigle_fee = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $out_pct = 0;
	
	/**
     * @ORM\Column(type="integer")
     */
    private $out_sigle_fee = 0;
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $curl_in_type = "";
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $curl_in_header = "";
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $curl_in_url = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $in_succ_column = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $in_fail_column = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $in_succ_column_value = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $in_sign_type = "";
	
	/**
     * @ORM\Column(type="string", length=10)
     */
    private $curl_out_type = "";
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $curl_out_header = "";
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $curl_out_url = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $out_succ_column = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $out_fail_column = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $out_succ_column_value = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $out_sign_type = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $out_succ_notify_column = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $out_succ_notify_column_value = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $in_succ_notify_column = "";
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $in_succ_notify_column_value = "";

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
     * Set masterId
     *
     * @param integer $masterId
     *
     * @return ChannelConfig
     */
    public function setMasterId($masterId)
    {
        $this->master_id = $masterId;

        return $this;
    }

    /**
     * Get masterId
     *
     * @return integer
     */
    public function getMasterId()
    {
        return $this->master_id;
    }

    /**
     * Set payinAppid
     *
     * @param string $payinAppid
     *
     * @return ChannelConfig
     */
    public function setPayinAppid($payinAppid)
    {
        $this->payin_appid = $payinAppid;

        return $this;
    }

    /**
     * Get payinAppid
     *
     * @return string
     */
    public function getPayinAppid()
    {
        return $this->payin_appid;
    }

    /**
     * Set payinSecret
     *
     * @param string $payinSecret
     *
     * @return ChannelConfig
     */
    public function setPayinSecret($payinSecret)
    {
        $this->payin_secret = $payinSecret;

        return $this;
    }

    /**
     * Get payinSecret
     *
     * @return string
     */
    public function getPayinSecret()
    {
        return $this->payin_secret;
    }

    /**
     * Set payoutAppid
     *
     * @param string $payoutAppid
     *
     * @return ChannelConfig
     */
    public function setPayoutAppid($payoutAppid)
    {
        $this->payout_appid = $payoutAppid;

        return $this;
    }

    /**
     * Get payoutAppid
     *
     * @return string
     */
    public function getPayoutAppid()
    {
        return $this->payout_appid;
    }

    /**
     * Set payoutSecret
     *
     * @param string $payoutSecret
     *
     * @return ChannelConfig
     */
    public function setPayoutSecret($payoutSecret)
    {
        $this->payout_secret = $payoutSecret;

        return $this;
    }

    /**
     * Get payoutSecret
     *
     * @return string
     */
    public function getPayoutSecret()
    {
        return $this->payout_secret;
    }

    /**
     * Set inPct
     *
     * @param integer $inPct
     *
     * @return ChannelConfig
     */
    public function setInPct($inPct)
    {
        $this->in_pct = $inPct;

        return $this;
    }

    /**
     * Get inPct
     *
     * @return integer
     */
    public function getInPct()
    {
        return $this->in_pct;
    }

    /**
     * Set inSigleFee
     *
     * @param integer $inSigleFee
     *
     * @return ChannelConfig
     */
    public function setInSigleFee($inSigleFee)
    {
        $this->in_sigle_fee = $inSigleFee;

        return $this;
    }

    /**
     * Get inSigleFee
     *
     * @return integer
     */
    public function getInSigleFee()
    {
        return $this->in_sigle_fee;
    }

    /**
     * Set outPct
     *
     * @param integer $outPct
     *
     * @return ChannelConfig
     */
    public function setOutPct($outPct)
    {
        $this->out_pct = $outPct;

        return $this;
    }

    /**
     * Get outPct
     *
     * @return integer
     */
    public function getOutPct()
    {
        return $this->out_pct;
    }

    /**
     * Set outSigleFee
     *
     * @param integer $outSigleFee
     *
     * @return ChannelConfig
     */
    public function setOutSigleFee($outSigleFee)
    {
        $this->out_sigle_fee = $outSigleFee;

        return $this;
    }

    /**
     * Get outSigleFee
     *
     * @return integer
     */
    public function getOutSigleFee()
    {
        return $this->out_sigle_fee;
    }

    /**
     * Set curlInType
     *
     * @param string $curlInType
     *
     * @return ChannelConfig
     */
    public function setCurlInType($curlInType)
    {
        $this->curl_in_type = $curlInType;

        return $this;
    }

    /**
     * Get curlInType
     *
     * @return string
     */
    public function getCurlInType()
    {
        return $this->curl_in_type;
    }

    /**
     * Set curlInHeader
     *
     * @param string $curlInHeader
     *
     * @return ChannelConfig
     */
    public function setCurlInHeader($curlInHeader)
    {
        $this->curl_in_header = $curlInHeader;

        return $this;
    }

    /**
     * Get curlInHeader
     *
     * @return string
     */
    public function getCurlInHeader()
    {
        return $this->curl_in_header;
    }

    /**
     * Set curlInUrl
     *
     * @param string $curlInUrl
     *
     * @return ChannelConfig
     */
    public function setCurlInUrl($curlInUrl)
    {
        $this->curl_in_url = $curlInUrl;

        return $this;
    }

    /**
     * Get curlInUrl
     *
     * @return string
     */
    public function getCurlInUrl()
    {
        return $this->curl_in_url;
    }

    /**
     * Set inSuccColumn
     *
     * @param string $inSuccColumn
     *
     * @return ChannelConfig
     */
    public function setInSuccColumn($inSuccColumn)
    {
        $this->in_succ_column = $inSuccColumn;

        return $this;
    }

    /**
     * Get inSuccColumn
     *
     * @return string
     */
    public function getInSuccColumn()
    {
        return $this->in_succ_column;
    }

    /**
     * Set inSuccColumnValue
     *
     * @param string $inSuccColumnValue
     *
     * @return ChannelConfig
     */
    public function setInSuccColumnValue($inSuccColumnValue)
    {
        $this->in_succ_column_value = $inSuccColumnValue;

        return $this;
    }

    /**
     * Get inSuccColumnValue
     *
     * @return string
     */
    public function getInSuccColumnValue()
    {
        return $this->in_succ_column_value;
    }

    /**
     * Set inSignType
     *
     * @param string $inSignType
     *
     * @return ChannelConfig
     */
    public function setInSignType($inSignType)
    {
        $this->in_sign_type = $inSignType;

        return $this;
    }

    /**
     * Get inSignType
     *
     * @return string
     */
    public function getInSignType()
    {
        return $this->in_sign_type;
    }

    /**
     * Set curlOutType
     *
     * @param string $curlOutType
     *
     * @return ChannelConfig
     */
    public function setCurlOutType($curlOutType)
    {
        $this->curl_out_type = $curlOutType;

        return $this;
    }

    /**
     * Get curlOutType
     *
     * @return string
     */
    public function getCurlOutType()
    {
        return $this->curl_out_type;
    }

    /**
     * Set curlOutHeader
     *
     * @param string $curlOutHeader
     *
     * @return ChannelConfig
     */
    public function setCurlOutHeader($curlOutHeader)
    {
        $this->curl_out_header = $curlOutHeader;

        return $this;
    }

    /**
     * Get curlOutHeader
     *
     * @return string
     */
    public function getCurlOutHeader()
    {
        return $this->curl_out_header;
    }

    /**
     * Set curlOutUrl
     *
     * @param string $curlOutUrl
     *
     * @return ChannelConfig
     */
    public function setCurlOutUrl($curlOutUrl)
    {
        $this->curl_out_url = $curlOutUrl;

        return $this;
    }

    /**
     * Get curlOutUrl
     *
     * @return string
     */
    public function getCurlOutUrl()
    {
        return $this->curl_out_url;
    }

    /**
     * Set outSuccColumn
     *
     * @param string $outSuccColumn
     *
     * @return ChannelConfig
     */
    public function setOutSuccColumn($outSuccColumn)
    {
        $this->out_succ_column = $outSuccColumn;

        return $this;
    }

    /**
     * Get outSuccColumn
     *
     * @return string
     */
    public function getOutSuccColumn()
    {
        return $this->out_succ_column;
    }

    /**
     * Set outSuccColumnValue
     *
     * @param string $outSuccColumnValue
     *
     * @return ChannelConfig
     */
    public function setOutSuccColumnValue($outSuccColumnValue)
    {
        $this->out_succ_column_value = $outSuccColumnValue;

        return $this;
    }

    /**
     * Get outSuccColumnValue
     *
     * @return string
     */
    public function getOutSuccColumnValue()
    {
        return $this->out_succ_column_value;
    }

    /**
     * Set outSignType
     *
     * @param string $outSignType
     *
     * @return ChannelConfig
     */
    public function setOutSignType($outSignType)
    {
        $this->out_sign_type = $outSignType;

        return $this;
    }

    /**
     * Get outSignType
     *
     * @return string
     */
    public function getOutSignType()
    {
        return $this->out_sign_type;
    }

    /**
     * Set outSuccNotifyColumn
     *
     * @param string $outSuccNotifyColumn
     *
     * @return ChannelConfig
     */
    public function setOutSuccNotifyColumn($outSuccNotifyColumn)
    {
        $this->out_succ_notify_column = $outSuccNotifyColumn;

        return $this;
    }

    /**
     * Get outSuccNotifyColumn
     *
     * @return string
     */
    public function getOutSuccNotifyColumn()
    {
        return $this->out_succ_notify_column;
    }

    /**
     * Set outSuccNotifyColumnValue
     *
     * @param string $outSuccNotifyColumnValue
     *
     * @return ChannelConfig
     */
    public function setOutSuccNotifyColumnValue($outSuccNotifyColumnValue)
    {
        $this->out_succ_notify_column_value = $outSuccNotifyColumnValue;

        return $this;
    }

    /**
     * Get outSuccNotifyColumnValue
     *
     * @return string
     */
    public function getOutSuccNotifyColumnValue()
    {
        return $this->out_succ_notify_column_value;
    }

    /**
     * Set inSuccNotifyColumn
     *
     * @param string $inSuccNotifyColumn
     *
     * @return ChannelConfig
     */
    public function setInSuccNotifyColumn($inSuccNotifyColumn)
    {
        $this->in_succ_notify_column = $inSuccNotifyColumn;

        return $this;
    }

    /**
     * Get inSuccNotifyColumn
     *
     * @return string
     */
    public function getInSuccNotifyColumn()
    {
        return $this->in_succ_notify_column;
    }

    /**
     * Set inSuccNotifyColumnValue
     *
     * @param string $inSuccNotifyColumnValue
     *
     * @return ChannelConfig
     */
    public function setInSuccNotifyColumnValue($inSuccNotifyColumnValue)
    {
        $this->in_succ_notify_column_value = $inSuccNotifyColumnValue;

        return $this;
    }

    /**
     * Get inSuccNotifyColumnValue
     *
     * @return string
     */
    public function getInSuccNotifyColumnValue()
    {
        return $this->in_succ_notify_column_value;
    }

    /**
     * Set inFailColumn
     *
     * @param string $inFailColumn
     *
     * @return ChannelConfig
     */
    public function setInFailColumn($inFailColumn)
    {
        $this->in_fail_column = $inFailColumn;

        return $this;
    }

    /**
     * Get inFailColumn
     *
     * @return string
     */
    public function getInFailColumn()
    {
        return $this->in_fail_column;
    }

    /**
     * Set outFailColumn
     *
     * @param string $outFailColumn
     *
     * @return ChannelConfig
     */
    public function setOutFailColumn($outFailColumn)
    {
        $this->out_fail_column = $outFailColumn;

        return $this;
    }

    /**
     * Get outFailColumn
     *
     * @return string
     */
    public function getOutFailColumn()
    {
        return $this->out_fail_column;
    }
}
