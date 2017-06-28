<?php
namespace Paytest\Services\Query;
/**
 * 订单查询服务数据展示转换
 */

class OrderQshow {
	/**
	 * 获取订单的明细数据
	 */
	public function getDetailOrder($orm){
		return [
			'orderCode'=>'xxx', 'commodityName'=>'天涯海角三日游', 'money'=>'999',  'datetime'=>'2017-09-12-16', 'xxx'=>'....'
		];
	}
}