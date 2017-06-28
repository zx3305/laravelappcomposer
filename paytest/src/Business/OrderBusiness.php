<?php
namespace Paytest\Business;

use Paytest\Repository\Entity\OrderEntity;
use Paytest\Repository\Entity\CommodityEntity;


/**
 * 订单业务逻辑
 */
class OrderBusiness {
	class add(OrderEntity $orderEntity, CommodityEntity $CommodityEntity){
		$commodity = new CommodityBusiness();
		$CommodityEntity = $commodity->sale($CommodityEntity, $orderEntity->stock, $orderEntity->money);			// 业务逻辑：扣减商品库存

		return [$orderEntity, $CommodityEntity];	
	}
}