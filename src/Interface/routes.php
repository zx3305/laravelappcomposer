<?php
Route::group(['middleware' => ['web'], 'namespace'=>'Paytest\Interface\Http'], function () {
	Route::any('/test/getorder', 'OrderController@getOrder');
	Route::any('/test/add', 'OrderController@add');
});