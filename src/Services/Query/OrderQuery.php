<?php
namespace Paytest\Services\Query;
use Paytest\Repository\Orm\OrderOrm;
use Paytest\Services\Query\OrderDisplay;
/**
 * 订单查询服务
 */
class OrderQuery{
	private $orderOrm;
	
	public function __contruct(){
		$this->orderOrm = new OrderOrm();
	}

	/**
	 * 获取订单
	 */
	public function getOrder($orderId){
		//伪代码 $orm = $this->orderOrm->find($orderId);
		$orm = null;
		$userType = 1;		// 假设1标识消费者
		$OrderQshow = new OrderQshow();

		return $OrderQshow->getDetailOrder($orm);
	}
}