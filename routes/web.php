<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('navbarerp');
////    return view('welcome');
//});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::get('gitpullbybat', function() { return view('gitpullbybat'); });
//Route::get('gitpullbybat', function() {
//    Log::info(getcwd());
//    exec('cd .. && git pull', $output);
//    Log::info($output);
//});

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/', function() { return view('navbarerp'); });
    Route::get('/home', function() { return view('navbarerp'); });
    Route::get('changeuser', 'HelperController@changeuser');
    Route::post('changeuser_store', 'HelperController@changeuser_store');
});


Route::group(['prefix' => 'ManufactureManage', 'namespace' => 'ManufactureManage', 'middleware' => ['web', 'auth']], function() {
    Route::resource('Processinfos', 'ProcessinfoController');
    Route::post('Processinfos/search', 'ProcessinfoController@search');
    Route::group(['prefix' => 'Processinfos'], function() {
        Route::get('getitemsbyprocesskey/{key}', 'ProcessinfoController@getitemsbyprocesskey');
    });

    Route::resource('Outputgreyfabric', 'OutputgreyfabricController');
    Route::post('Outputgreyfabric/search', 'OutputgreyfabricController@search');
    Route::get('Outputgreyfabric/create/summeter', 'OutputgreyfabricController@summeter');

    Route::resource('Outputquantity', 'OutputquantityController');
    Route::post('Outputquantity/search', 'OutputquantityController@search');

    Route::resource('Outputheads', 'OutputheadController');
    Route::resource('Outputitems', 'OutputitemController');
    Route::group(['prefix' => 'Outputheads/{id}'], function() {
        Route::get('/detail', 'OutputheadController@detail');
    });
    Route::get('Outputitems/{headId}/create', 'OutputitemController@create');
    Route::group(['prefix' => 'Quantityreporthead/{id}'], function() {
        Route::get('/detail', 'QuantityreportheadController@detail');
    });
    Route::resource('Quantityreporthead', 'QuantityreportheadController');
    Route::resource('Quantityreportitem', 'QuantityreportitemController');
    Route::get('Quantityreportitem/{headId}/create', 'QuantityreportitemController@create');
    Route::get('Quantityreportitem/{headId}/refresh', 'QuantityreportitemController@refresh');

    Route::resource('Outputquantityhead', 'OutputquantityheadController');
    Route::resource('Outputquantityitem', 'OutputquantityitemController');
    Route::get('Outputquantityitem/{headId}/create', 'OutputquantityitemController@create');
    Route::get('Outputquantityitem/{headId}/refresh', 'OutputquantityitemController@refresh');

    Route::post('Outputquantityhead/search', 'OutputquantityheadController@search');

    Route::group(['prefix' => 'Outputquantityhead/{id}'], function() {
        Route::get('/detail', 'OutputquantityheadController@detail');
    });

    Route::get('Report', '\App\Http\Controllers\System\ReportController@indexgreyfabricdata');
});

Route::get('gitpullbybat', function() { return view('gitpullbybat'); });

Route::group(['prefix' => '', 'namespace' => 'My', 'middleware' => ['web', 'auth']], function() {
});

Route::middleware(['auth', 'web'])->namespace('System')->prefix('system')->group(function () {
    Route::group(['prefix' => 'users'], function() {
//        Route::post('updateuseroldall', 'UsersController@updateuseroldall');
        Route::post('search', 'UserController@search');              // 搜索功能
//        Route::get('getitemsbykey/{key}', 'UsersController@getitemsbykey');
        Route::get('editpass', 'UserController@editpass_per');
    });
    Route::group(['prefix' => 'users/{id}'], function() {
        Route::get('editpass', 'UserController@editpass');
        Route::post('updatepass', 'UserController@updatepass');
//        Route::get('google2fa', 'UsersController@google2fa');
//        Route::post('updategoogle2fa', 'UsersController@updategoogle2fa');
    });

    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::post('userroles/store', 'UserroleController@store');

    Route::group(['prefix' => 'users/{user}/roles'], function () {
        Route::get('/', 'UserroleController@index');
        Route::get('create', 'UserroleController@create');
        Route::post('store', 'UserroleController@store');
        Route::delete('destroy/{role}', 'UserroleController@destroy');
    });
    Route::group(['prefix' => 'roles/{role}/permissions'], function() {
        Route::get('/', 'RolepermissionController@index');
        Route::get('create', 'RolepermissionController@create');
        Route::delete('destroy/{permission}', 'RolepermissionController@destroy');
    });
    Route::post('rolepermissions/store', 'RolepermissionController@store');
    Route::group(['prefix' => 'reports/{report}'], function() {
        Route::any('statistics/{autostatistics?}', 'ReportController@statistics');
        Route::post('export', 'ReportController@export');
    });
    Route::resource('reports', 'ReportController');
});