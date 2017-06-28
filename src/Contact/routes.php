<?php
Route::group(['middleware' => ['web'], 'namespace'=>'Paytest\Contact\Http'], function () {
	Route::any('/test/getorder', 'OrderController@getOrder');
	Route::any('/test/add', 'OrderController@add');
});