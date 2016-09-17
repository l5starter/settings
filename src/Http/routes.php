<?php

Route::group(['namespace' => 'L5Starter\Setting\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    // Settings
    Route::get('settings', ['as' => 'admin.settings.index', 'uses' => 'SettingController@index']);
    Route::post('settings/update', ['as' => 'admin.settings.update', 'uses' => 'SettingController@update']);
});
