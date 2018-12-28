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

// Example Routes
use Illuminate\Support\Facades\Route;

/*
Route::view('/dashboard', 'dashboard');
Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');*/

Auth::routes();

Route::get('/ps', function () {
    $x        = new \App\Client();
    $x->price = "22";
    $x->save();
    dd($x);
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function () {
    echo "ok";
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});
Route::get('/prr', function () {

});

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'HomeController@index');
    Route::get('/category/getAll', 'CategoryController@getAll')->name('category.getAll');
    Route::resource('category', 'CategoryController');




    Route::resource('/invoice', 'InvoiceController');
    Route::post('/order/invoice/{id}', 'OrderController@invoicedorder');
    Route::post('/invoice/invoiceAll', 'InvoiceController@invoiceAll');


    Route::post('/price/getedit/{id}', 'ProductPriceController@getEdit');
    Route::resource('price', 'ProductPriceController');
    Route::post('/price/updateByTitle/{id}', 'ProductPriceController@updateByTitle');


    Route::resource('order', 'OrderController');


    

    Route::post('/order/getClientPriceList', 'OrderController@getClientPriceList');
    
    Route::get('recurrentOrder', 'OrderController@recurrentIndex');
    Route::get('/order/client/{id}', 'OrderController@clientorder');
    Route::post('/order/approveOrder', 'OrderController@approveOrder');


    Route::resource('product', 'ProductController');
    Route::resource('/client', 'ClientController');
    Route::get('/setting', 'Controller@setting')->name('setting.index');
    Route::post('/settingupdate', 'Controller@setting_update')->name('setting.update');
    Route::resource('/supplier', 'SupplierController');







    Route::get('/ordershow/{id}' ,  'OrderController@getshow');
    

    Route::post('/order/getList', 'OrderController@getList');

});

/*
Route::get('users', function(UsersDataTable $dataTable) {
	return $dataTable->render('users.index');
});*/


Route::get('/test', 'OrderController@indexEvent');

Route::post('/eventorder', 'OrderController@eventorder');
Route::get('/eventcalendar', 'OrderController@eventorder1');


Route::get('/getddt', 'OrderController@getddt');
Route::post('/ddt', 'OrderController@ddt');


Route::get('/getproduction', 'OrderController@getproduction');
Route::post('/getproduction', 'OrderController@production');


Route::get('/schedule/{order?}', function () {
    Artisan::call('make:order');
    return 'DONE';
});
Route::get('/ps', function () {


    $date = new DateTime('2018-12-24');
    $l    = (int)$date->format('U');
    $m    = \App\EventMeta::with(['event', 'event.order', 'event.order.client'])
                          ->whereRaw("((" . $l . " - repeat_start ) %   repeat_interval) = 0")->get()->toArray();
    dd($m);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
