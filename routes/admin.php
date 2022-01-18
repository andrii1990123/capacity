<?php

Route::get('/home', 'Admin\HomeController@index')->name('home');

/**
 * ROLES
 */
 Route::get('/role/{role}/permissions','Admin\RoleController@permissions');
 Route::get('/rolePermissions','Admin\RoleController@rolePermissions')->name('myrolepermission');
 Route::get('/roles/all','Admin\RoleController@all');
 Route::post('/assignPermission','Admin\RoleController@attachPermission');
 Route::post('/detachPermission','Admin\RoleController@detachPermission');
 Route::resource('/roles','Admin\RoleController');

 /**
  * PERMISSIONs
  */
 Route::get('/permissions/all','Admin\PermissionController@all');
 Route::resource('/permissions','Admin\PermissionController');


 /**
 * ADMINs
 */
Route::get('/profile','Admin\AdminController@profileEdit');
Route::put('/profile/{admin}','Admin\AdminController@profileUpdate');
Route::put('/changepassword/{admin}','Admin\AdminController@changePassword');
Route::put('/administrator/status','Admin\AdminController@switchStatus');
Route::post('/administrator/removeBulk','Admin\AdminController@destroyBulk');
Route::put('/administrator/statusBulk','Admin\AdminController@switchStatusBulk');
Route::resource('/administrator','Admin\AdminController');

/**
 * USERS
 */
Route::put('/user/status','Admin\UserController@switchStatus');
Route::post('/user/removeBulk','Admin\UserController@destroyBulk');
Route::put('/user/statusBulk','Admin\UserController@switchStatusBulk');
Route::get('/user/{id}/cellar','Admin\UserController@showUserCellar');
Route::resource('/user','Admin\UserController');


Route::get('/SystemPasswordSetView', 'Admin\HomeController@SystemPasswordSetView');
Route::post('/EditSystemPasswordSetPost', 'Admin\HomeController@EditSystemPasswordSetPost');

Route::get('/logout', 'Admin\HomeController@logout');
Route::get('/SettingView', 'Admin\HomeController@SettingView');
Route::get('/EditSettingView', 'Admin\HomeController@EditSettingView');
Route::post('/EditSettingPost', 'Admin\HomeController@EditSettingPost');

Route::get('/SolicitorListView', 'Admin\HomeController@SolicitorListView');
Route::get('/Solicitor/Add', 'Admin\HomeController@SolicitorAddView');
Route::post('/Solicitor/Add', 'Admin\HomeController@SolicitorAddPost');
Route::get('/Solicitor/Edit/{id}', 'Admin\HomeController@SolicitorEditView');
Route::post('/Solicitor/Edit', 'Admin\HomeController@SolicitorEditPost');
Route::post('/Solicitor/Remove', 'Admin\HomeController@SolicitorRemovePost');

Route::get('/EstateAgentListView', 'Admin\HomeController@EstateAgentListView');
Route::get('/EstateAgent/Add', 'Admin\HomeController@EstateAgentAddView');
Route::post('/EstateAgent/Add', 'Admin\HomeController@EstateAgentAddPost');
Route::get('/EstateAgent/Edit/{id}', 'Admin\HomeController@EstateAgentEditView');
Route::post('/EstateAgent/Edit', 'Admin\HomeController@EstateAgentEditPost');
Route::post('/EstateAgent/Remove', 'Admin\HomeController@EstateAgentRemovePost');

Route::get('/LenderListView', 'Admin\HomeController@LenderListView');
Route::get('/Lender/Add', 'Admin\HomeController@LenderAddView');
Route::post('/Lender/Add', 'Admin\HomeController@LenderAddPost');
Route::get('/Lender/Edit/{id}', 'Admin\HomeController@LenderEditView');
Route::post('/Lender/Edit', 'Admin\HomeController@LenderEditPost');
Route::post('/Lender/Remove', 'Admin\HomeController@LenderRemovePost');

Route::get('/LinkESView', 'Admin\HomeController@LinkESView');
Route::post('/GetESSelected', 'Admin\HomeController@GetESSelected');
Route::post('/LinkESPost', 'Admin\HomeController@LinkESPost');


Route::get('/LinkLSView', 'Admin\HomeController@LinkLSView');
Route::post('/GetLSSelected', 'Admin\HomeController@GetLSSelected');
Route::post('/LinkLSPost', 'Admin\HomeController@LinkLSPost');


Route::get('/FirmCapacityListView', 'Admin\HomeController@FirmCapacityListView');
Route::post('/EditCurrentCapacity', 'Admin\HomeController@EditCurrentCapacity');
Route::post('/EditWeeklyCapacity', 'Admin\HomeController@EditWeeklyCapacity');
Route::post('/SetFirmState', 'Admin\HomeController@SetFirmState');


Route::post('/GetCapcity', 'Admin\HomeController@GetCapcity');