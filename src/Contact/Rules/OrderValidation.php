<?php
namespace Paytest\Contact\Rules;
use  Paytest\Contact\Request;

/**
 * http请求数据验证器
 */

class OrderValidation extends Request{
	protected $identifyMethod = true;
	
	public function getRules(){
		return [
			'getorder' => $this->getOrder(),
			'add' => []
		];
	}

	protected function getOrder(){
		return [
			'orderId' => 'required|integer'
		];
	}
}