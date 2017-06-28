<?php
Route::group(['middleware' => ['web'], 'namespace'=>'Paytest\Interface\Http'], function () {
	Route::get('/test/getorder', 'OrderControl@getOrder');
	Route::put('/test/add', 'OrderControl@add');
});