<?php
namespace AppBundle\Utils;

class StatusMeta
{
	private $status = [
		'DEF'=>'订单准备创建',
		'GENERATED'=>'订单被创建',
		'CREATE_FAILED'=>'订单创建失败',
		'TRADE_ING'=>'支付中',
		'SUCCESS'=>'交易成功',
		'FAIL'=>'交易失败',
		'EXPIRED'=>'交易过期',
		'RETURN'=>'交易退还',
		'ABNORMAL'=>'交易异常',
		'HANG'=>'交易挂起',
		'OTHER'=>'其他异常状态',
		'INVALID'=>'交易失败',
		'REFUND'=>'退款',
		'START'=>'交易发起',
		'CANCEL'=>'交易取消',
		'PENDING'=>'待审核',
		'NOTSURE'=>'代收成功但金额不一致',
		'CLOSED'=>'交易关闭',
		'PAYED'=>'已付款',
		'YCD'=>'已催单',
		'NOTIFYED'=>'已回调',
		'REJECTED'=>'已驳回',
		'COMPLETE'=>'业务处理完成',
	];
	
	public function Get($name='')
	{
		if('' != $name && array_key_exists($name,$status))
		{
			return $this->status[$name];
		}
		else
		{
			return '-';
		}
	}
	
	public function GetAll()
	{
		return $this->status;
	}
}

