<?php
    //权限管理
    Route::get('ddoc', 'Jormin\DDoc\Controllers\DDocController@index');
    Route::get('ddoc/export/{type}', 'Jormin\DDoc\Controllers\DDocController@export');
