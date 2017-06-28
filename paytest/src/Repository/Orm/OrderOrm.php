<?php
namespace Paytest\Repository\Orm;
use App\Models\MModel;

/**
 * 订单数据存储（这里就只写伪代码了）
 */

class OrderOrm extends Model{
	protected $table = "order_test";

	public $money = 1000;

	public $id = 1;

	public $commodityId = 1;

	public $stock = 1;

	/**
	 * 存储实体
	 */
	public function saveEntity(){
		// to do something
		return 1;
	}
}