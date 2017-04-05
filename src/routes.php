<?php
    //权限管理
    Route::get('ddoc', ['as'=>'ddoc','uses'=>'Jormin\DDoc\Controllers\DDocController@index']);
    Route::get('ddoc/export/{type}', ['as'=>'ddoc.export','uses'=>'Jormin\DDoc\Controllers\DDocController@export']);
