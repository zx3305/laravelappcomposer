<?php 
namespace Paytest\Events;

use Kkt\Lib\Support\AmqpProduce;

class PayEvent extends AmqpProduce{
	/**
	 * 支付成功
	 */
	public function sendMsg(string $msg){
		
	}
}