<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::controllers([
        'summary' => 'AdminSummaryController',
        'enterprise' => 'AdminEnterpriseController',
        'personnel' => 'AdminPersonnelController',
        'message' => 'AdminMessageController',
        'log' => 'AdminLogController',
        'manage' => 'AdminManageController',
        'account' => 'AdminAccountController',
        'index' => 'AdminIndexController',
        '/' => 'AdminIndexController'
    ]);
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
    '/' => 'HomeController'
]);
