<?php
namespace Paytest\Business;

use Paytest\Business\Exceptions\CommodityExceptions;
use Paytest\Repository\Entity\CommodityEntity;

/**
 * 商品处理业务逻辑
 */
class CommodityBusiness{
	/**
	 * 商品售出
	 * @param int $commodityId 商品id
	 * @param $stock 售出数量
	 * @param $money 售出总价
	 */
	public function sale(CommodityEntity $commodity, $stock, $money){
		if($commodity->stock < $stock){
			throw new CommodityExceptions('商品库存不足'.$stock, 12);
		}else if(($commodity->price * $stock) != $money){
			throw new CommodityExceptions('出售价格不合理'.$money, 13);
		}
		$commodity->stock = $commodity->stock - $stock;
		return $commodity;
	}
}