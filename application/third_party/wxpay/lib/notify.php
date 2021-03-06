<?php
// ini_set('date.timezone','Asia/Shanghai');
// error_reporting(E_ERROR);

require_once "WxPay.Api.php";
require_once 'WxPay.Notify.php';
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler(APPPATH."third_party/wxpay/logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	public $sessionId='';
	public $usb='';
	public $total_fee = '';
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		echo '回调成功！';
		if(isset($data['attach'])){
			$ss = explode('--', $data['attach']);
			$sessionId = $ss[0];
			if(isset($ss[1])){
				$usb = $ss[1];
			}else{
				$usb = '';
			}
			$this->setSessionId($sessionId);
			$this->setUsb($usb);
		}
		if(isset($data['total_fee'])){
			$this->setTotalFee($data['total_fee']);
		}
		Log::DEBUG("call back end: true");
		return true;
	}
	public function setUsb($usb){
		$this->usb = $usb;
	}
	public function getUsb(){
		return $this->usb;
	}
	public function setSessionId($sessionId){
		$this->sessionId = $sessionId;
	}
	public function getSessionId(){
		return $this->sessionId;
	}
	public function setTotalFee($total_fee){
		$this->total_fee = $total_fee;
	}
	public function getTotalFee(){
		return $this->total_fee;
	}
}

// Log::DEBUG("begin notify");
// $notify = new PayNotifyCallBack();
// $notify->Handle(false);
