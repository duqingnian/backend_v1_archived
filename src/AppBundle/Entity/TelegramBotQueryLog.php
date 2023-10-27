<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="app_telegram_bot_query_log")
 */
class TelegramBotQueryLog
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
    private $bot_id = 0;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $bot_token = '';
	
	/**
     * @ORM\Column(type="integer")
     */
    private $shanghu_id = 0; //商户ID
	
	/**
     * @ORM\Column(type="integer")
     */
    private $channel_id = 0;  //通道id
	
	/**
     * @ORM\Column(type="integer")
     */
    private $order_id = 0;  //订单id
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $plantform_order_no = ''; //平台订单号
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $sh_order_no = ''; //平台的商户订单号
	
	/**
     * @ORM\Column(type="string", length=15)
     */
    private $order_status = '';
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $ask_chat_id = '';
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $ask_chat_name = '';
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $ask_message_id = '';
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $ask_from_id = '';
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $ask_from_name = '';
	
	/**
     * @ORM\Column(type="integer")
     */
    private $ask_time = 0; //创建时间
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $reply_chat_id = '';
	
	/**
     * @ORM\Column(type="string", length=100)
     */
    private $reply_chat_name = '';
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $reply_message_id = '';
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $reply_from_id = '';
	
	/**
     * @ORM\Column(type="string", length=50)
     */
    private $reply_from_name = '';
	
	/**
     * @ORM\Column(type="integer")
     */
    private $reply_time = 0; //创建时间
	
	/**
     * @ORM\Column(type="string", length=20)
     */
    private $reply_result = '';
	

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
     * Set botId
     *
     * @param integer $botId
     *
     * @return TelegramBotQueryLog
     */
    public function setBotId($botId)
    {
        $this->bot_id = $botId;

        return $this;
    }

    /**
     * Get botId
     *
     * @return integer
     */
    public function getBotId()
    {
        return $this->bot_id;
    }

    /**
     * Set shanghuId
     *
     * @param integer $shanghuId
     *
     * @return TelegramBotQueryLog
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
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return TelegramBotQueryLog
     */
    public function setChannelId($channelId)
    {
        $this->channel_id = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return integer
     */
    public function getChannelId()
    {
        return $this->channel_id;
    }

    /**
     * Set orderId
     *
     * @param integer $orderId
     *
     * @return TelegramBotQueryLog
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
     * Set plantformOrderNo
     *
     * @param string $plantformOrderNo
     *
     * @return TelegramBotQueryLog
     */
    public function setPlantformOrderNo($plantformOrderNo)
    {
        $this->plantform_order_no = $plantformOrderNo;

        return $this;
    }

    /**
     * Get plantformOrderNo
     *
     * @return string
     */
    public function getPlantformOrderNo()
    {
        return $this->plantform_order_no;
    }

    /**
     * Set orderStatus
     *
     * @param string $orderStatus
     *
     * @return TelegramBotQueryLog
     */
    public function setOrderStatus($orderStatus)
    {
        $this->order_status = $orderStatus;

        return $this;
    }

    /**
     * Get orderStatus
     *
     * @return string
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * Set askChatId
     *
     * @param string $askChatId
     *
     * @return TelegramBotQueryLog
     */
    public function setAskChatId($askChatId)
    {
        $this->ask_chat_id = $askChatId;

        return $this;
    }

    /**
     * Get askChatId
     *
     * @return string
     */
    public function getAskChatId()
    {
        return $this->ask_chat_id;
    }

    /**
     * Set askChatName
     *
     * @param string $askChatName
     *
     * @return TelegramBotQueryLog
     */
    public function setAskChatName($askChatName)
    {
        $this->ask_chat_name = $askChatName;

        return $this;
    }

    /**
     * Get askChatName
     *
     * @return string
     */
    public function getAskChatName()
    {
        return $this->ask_chat_name;
    }

    /**
     * Set askMessageId
     *
     * @param string $askMessageId
     *
     * @return TelegramBotQueryLog
     */
    public function setAskMessageId($askMessageId)
    {
        $this->ask_message_id = $askMessageId;

        return $this;
    }

    /**
     * Get askMessageId
     *
     * @return string
     */
    public function getAskMessageId()
    {
        return $this->ask_message_id;
    }

    /**
     * Set askFromId
     *
     * @param string $askFromId
     *
     * @return TelegramBotQueryLog
     */
    public function setAskFromId($askFromId)
    {
        $this->ask_from_id = $askFromId;

        return $this;
    }

    /**
     * Get askFromId
     *
     * @return string
     */
    public function getAskFromId()
    {
        return $this->ask_from_id;
    }

    /**
     * Set askFromName
     *
     * @param string $askFromName
     *
     * @return TelegramBotQueryLog
     */
    public function setAskFromName($askFromName)
    {
        $this->ask_from_name = $askFromName;

        return $this;
    }

    /**
     * Get askFromName
     *
     * @return string
     */
    public function getAskFromName()
    {
        return $this->ask_from_name;
    }

    /**
     * Set askTime
     *
     * @param integer $askTime
     *
     * @return TelegramBotQueryLog
     */
    public function setAskTime($askTime)
    {
        $this->ask_time = $askTime;

        return $this;
    }

    /**
     * Get askTime
     *
     * @return integer
     */
    public function getAskTime()
    {
        return $this->ask_time;
    }

    /**
     * Set replyChatId
     *
     * @param string $replyChatId
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyChatId($replyChatId)
    {
        $this->reply_chat_id = $replyChatId;

        return $this;
    }

    /**
     * Get replyChatId
     *
     * @return string
     */
    public function getReplyChatId()
    {
        return $this->reply_chat_id;
    }

    /**
     * Set replyChatName
     *
     * @param string $replyChatName
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyChatName($replyChatName)
    {
        $this->reply_chat_name = $replyChatName;

        return $this;
    }

    /**
     * Get replyChatName
     *
     * @return string
     */
    public function getReplyChatName()
    {
        return $this->reply_chat_name;
    }

    /**
     * Set replyMessageId
     *
     * @param string $replyMessageId
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyMessageId($replyMessageId)
    {
        $this->reply_message_id = $replyMessageId;

        return $this;
    }

    /**
     * Get replyMessageId
     *
     * @return string
     */
    public function getReplyMessageId()
    {
        return $this->reply_message_id;
    }

    /**
     * Set replyFromId
     *
     * @param string $replyFromId
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyFromId($replyFromId)
    {
        $this->reply_from_id = $replyFromId;

        return $this;
    }

    /**
     * Get replyFromId
     *
     * @return string
     */
    public function getReplyFromId()
    {
        return $this->reply_from_id;
    }

    /**
     * Set replyFromName
     *
     * @param string $replyFromName
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyFromName($replyFromName)
    {
        $this->reply_from_name = $replyFromName;

        return $this;
    }

    /**
     * Get replyFromName
     *
     * @return string
     */
    public function getReplyFromName()
    {
        return $this->reply_from_name;
    }

    /**
     * Set replyTime
     *
     * @param integer $replyTime
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyTime($replyTime)
    {
        $this->reply_time = $replyTime;

        return $this;
    }

    /**
     * Get replyTime
     *
     * @return integer
     */
    public function getReplyTime()
    {
        return $this->reply_time;
    }

    /**
     * Set replyResult
     *
     * @param string $replyResult
     *
     * @return TelegramBotQueryLog
     */
    public function setReplyResult($replyResult)
    {
        $this->reply_result = $replyResult;

        return $this;
    }

    /**
     * Get replyResult
     *
     * @return string
     */
    public function getReplyResult()
    {
        return $this->reply_result;
    }

    /**
     * Set shOrderNo
     *
     * @param string $shOrderNo
     *
     * @return TelegramBotQueryLog
     */
    public function setShOrderNo($shOrderNo)
    {
        $this->sh_order_no = $shOrderNo;

        return $this;
    }

    /**
     * Get shOrderNo
     *
     * @return string
     */
    public function getShOrderNo()
    {
        return $this->sh_order_no;
    }

    /**
     * Set botToken
     *
     * @param string $botToken
     *
     * @return TelegramBotQueryLog
     */
    public function setBotToken($botToken)
    {
        $this->bot_token = $botToken;

        return $this;
    }

    /**
     * Get botToken
     *
     * @return string
     */
    public function getBotToken()
    {
        return $this->bot_token;
    }
}
