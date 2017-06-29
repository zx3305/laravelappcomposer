<?php 
namespace Unittest;

use Tests\TestCase;
use Paytest\Business\OrderBusiness;
use Paytest\Repository\Entity\OrderEntity;
use Paytest\Repository\Entity\CommodityEntity;
use Paytest\Business\Exceptions\CommodityExceptions;


class OrderBusinessTest extends TestCase{
	private $orderBusiness;

	public function __contruct(){
		$this->orderBusiness = new OrderBusiness();
	}
	/**
	 * 正常下单测试
	 */
	public function testNormalAdd(){
		$orderEntity = new OrderEntity();
		$commodityEntity = new CommodityEntity(1);
		$oldStock = $commodityEntity->stock;
		$orderEntity->stock = 1;
		$orderEntity->money = 100;

		$orderBusiness = new OrderBusiness();
		$result = $orderBusiness->add($orderEntity, $commodityEntity);

		// 断言商品库存减1
		$this->assertEquals($result[1]->stock, $oldStock-1);
	}

	/**
	 * 库存不足的极限测试
	 * @test
	 */
	public function haveNotEnouthStock(){
		$orderEntity = new OrderEntity();
		$commodityEntity = new CommodityEntity(1);
		$orderEntity->stock = 1000;
		$orderEntity->money = 100;

		// 断言抛出异常	
		$this->expectException(CommodityExceptions::class);	

		$orderBusiness = new OrderBusiness();
		$orderBusiness->add($orderEntity, $commodityEntity);
	}

	/**
	 * 订单价格过大极限测试
	 * @test
	 */
	public function errorPriceStock(){
		$orderEntity = new OrderEntity();
		$commodityEntity = new CommodityEntity(1);
		$orderEntity->stock = 1;
		$orderEntity->money = 20000;

		// 断言抛出异常	
		$this->expectException(CommodityExceptions::class);	

		$orderBusiness = new OrderBusiness();
		$orderBusiness->add($orderEntity, $commodityEntity);
	}
}