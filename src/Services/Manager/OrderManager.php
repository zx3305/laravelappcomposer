<?php 
namespace Paytest\Services\Manager;

use Paytest\Repository\Entity\CommodityEntity;
use Paytest\Repository\Entity\OrderEntity;
use Paytest\Repository\Orm\OrderOrm;
use Paytest\Repository\Orm\CommodityOrm;
use Paytest\Business\orderBusiness;
use DB;

/**
 * 订单服务管理
 */
class OrderManager {
	/**
	 * 下单(这里只是服务调用，不要涉及任何业务逻辑（行为）)
	 */
	public function add($commodityId, $stock, $money){
		// 构建商品实体对象
		$modEntity = new CommodityEntity($commodityId);

		// 创建一个新的订单实体
		$orderEntity = new OrderEntity();
		$orderEntity->stock = $stock;
		$orderEntity->money = $money;

		// 调用下单业务逻辑
		$orderBusiness = new orderBusiness();
		$result = $orderBusiness->add($orderEntity, $modEntity);

		// 调用存储服务，启用事务，落地存储
		try{
			// DB::beginTransaction();
			$orderOrm = new OrderOrm();
			$commodityOrm = new CommodityOrm();
			$orderId = $orderOrm->saveEntity($result[0]);
			$commodityOrm->saveEntity($result[1]);		
			// DB::commit();	
			return $orderId;
		}catch(Exceptions $e){
			// DB::rollBack();
			throw $e;
		}
	}

	/**
	 * 取消订单
	 */
	public function cancle($orderId){

	}

	/**
	 * 支付
	 */
	public function pay($orderId, $amount){

	}
}