<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::group(":version",function (){
    Route::resource('archives','api/:version.Archives');
    Route::resource('disease','api/:version.Disease');
    Route::resource('drug','api/:version.Drug');
    Route::resource('cart','api/:version.Cart');
    Route::resource('medchufang','api/:version.Medchufang');
    Route::put('medchufang','api/:version.Medchufang/update');
    Route::get('drugDetail','api/:version.Drug/drugDetail');
    Route::post('prescribe','api/:version.Prescribe/save');
    Route::put('prescribe','api/:version.Prescribe/update');
})->middleware("CheckToken");
Route::get(":version/token","api/:version.Token/getToken");


