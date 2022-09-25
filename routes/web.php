<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});





//Settings
    Route::get('/settup/settings', 'Settups\SettingsController@index');
     
    Route::get('/acc/front','Accomodation\FrontContoroller@index');
     
//Accomodation
    Route::get('/acc/service/check-in/all', 'Accomodation\CheckInController@checkedIn');
    Route::get('/acc/service/check-in', 'Accomodation\CheckInController@create');
    Route::post('/acc/service/customer-store', 'Accomodation\CheckInController@customerPostRegistration');
    Route::get('/acc/service/check-in/group', 'Accomodation\CheckInController@createGroup');
    Route::post('/acc/service/group-store', 'Accomodation\CheckInController@GroupPostRegistration');
    Route::get('/acc/service/customer-check-out/{id1}/{id2}', 'Accomodation\CheckInController@update');
    Route::get('/acc/service/filter-room/{id}', 'Accomodation\CheckInController@filterRoom');
    Route::get('/acc/service/room-price/{id}', 'Accomodation\CheckInController@filterPrice');
    Route::get('/acc/service/customer-view/{id}', 'Accomodation\CheckInController@show');
    Route::get('/acc/service/add-charges/{id}', 'Accomodation\CheckInController@addCharges');
    Route::post('/acc/service/charges-store', 'Accomodation\CheckInController@storeCharges');
    Route::post('/acc/service/deni-store', 'Accomodation\CheckInController@storeDeni');
    Route::get('/acc/service/invoince/{id}', 'Accomodation\CheckInController@invoince');


    Route::get('/acc/service/check-out/all', 'Accomodation\CheckOutController@index');
    Route::get('/acc/service/customer-check-in/{id1}/{id2}', 'Accomodation\CheckOutController@update');
    Route::get('/acc/service/customer-view-out/{id}', 'Accomodation\CheckOutController@show');
    
    

    Route::get('/acc/service/booking/all', 'Accomodation\BookingController@index');
    Route::get('/acc/service/customer-check-in/{id}', 'Accomodation\BookingController@update');
    Route::get('/acc/service/delete-booking/{id}/delete', 'Accomodation\BookingController@destroy');


    Route::get('/acc/service/reservation/all', 'Accomodation\ReservationController@index');
    Route::get('/acc/service/reservation', 'Accomodation\ReservationController@create');
    Route::post('/acc/service/reserver-store', 'Accomodation\ReservationController@reserverPostRegistration');
    Route::get('/acc/service/customer-check-in/{id}', 'Accomodation\ReservationController@update');
    Route::get('/acc/service/delete-reservation/{id}/delete', 'Accomodation\ReservationController@destroy');


    Route::get('/acc/service/all/customer-list', 'Accomodation\CustomerListController@index');


    Route::get('/acc/service/payments/all/customer-list', 'Accomodation\ReveivePaymentController@index');
    Route::get('/acc/service/payments/all/pending', 'Accomodation\ReveivePaymentController@pending');
    Route::get('/acc/service/customer-check-receive/{id}', 'Accomodation\ReveivePaymentController@recievePayment');
    Route::post('/acc/service/receive-store','Accomodation\ReveivePaymentController@recievePayments');
    
// Conference
    Route::get('/confe/service/new', 'ConferenceController@index');
    Route::get('/confe/service/booking', 'ConferenceController@create');
    Route::get('/confe/service/hall-price/{id}', 'ConferenceController@filterPrice');
    Route::post('/confe/service/hall-customer', 'ConferenceController@store');
    Route::post('/custo/action','ConferenceController@confeAction')->name('custo.action');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    
    // Route::resource('roles','RoleController');
  
    Route::resource('users','UserController');

    Route::resource('products','ProductController');

    Route::resource('role','RoleController');
    Route::post('/roles/update/{id}','RoleController@update');
    Route::get('/role/{id}/edit','RoleController@edit');
    Route::get('/role/{id}/delete','RoleController@destroy');
    
    Route::resource('module','ModuleController');
    Route::resource('feature','FreatureController');
    Route::resource('featuremodule','FreatureModelController');

    Route::get('/settup/bacres', 'Settups\BackupController@index')->name('backup');
    Route::get('/role/{id}/assign-persmission', 'RoleController@asign');
    Route::get('/module/{id}/assign-feature', 'FreatureController@showFeature');

    //accomodation settup
    Route::get('/settup/accomodation/id', 'Settups\IdsController@index')->name('idtype');
    Route::post('/settup/accomodation/idAdd', 'Settups\IdsController@store');
    Route::delete('/settup/accomodation/iddelete/{id}', 'Settups\IdsController@destroy');
    Route::post('/settup/accomodation/idupdate', 'Settups\IdsController@update');

    //room
    Route::get('/settup/accomodation/room', 'Settups\RoomController@index');
    Route::get('/room/{id}/delete', 'Settups\RoomController@destroy');
    Route::get('/room-category/{id}/edit', 'Settups\RoomCategoryController@edit');
    Route::delete('/room-category/{id}/delete', 'Settups\RoomCategoryController@destroy');

    Route::post('/settup/accomodation/room', 'Settups\RoomController@store');
    Route::get('/settup/accomodation/room-category', 'Settups\RoomCategoryController@index');
    Route::post('/settup/accomodation/room-category', 'Settups\RoomCategoryController@store');
    
    Route::get('/settup/accomodation/room-status', 'Settups\RoomStatusController@index');
    Route::post('/settup/accomodation/room-status', 'Settups\RoomStatusController@store');
    Route::post('/room-status/{id}/delete', 'Settups\RoomStatusController@destroy');


    //bar settup
    Route::get('/settup/bar', 'Settups\Bar\BarController@index');
    Route::post('/settup/bar', 'Settups\Bar\BarController@store');
    Route::get('/settup/bar/item', 'Settups\Bar\ItemController@index');
    Route::post('/barItem/action','Settups\Bar\ItemController@action')->name('barItem.action');
    
    Route::post('/bar/action','Settups\Bar\BarController@barAction')->name('bar.action');
   
    Route::post('/settup/bar/item', 'Settups\Bar\ItemController@store');
    Route::get('/settup/bar/item-category', 'Settups\Bar\ItemCategoryController@index');
    Route::post('/barCatItem/action','Settups\Bar\ItemCategoryController@action')->name('barCatItem.action');

    Route::post('/settup/bar/drink-category', 'Settups\Bar\ItemCategoryController@store');

    Route::get('/settup/bar/assign-staff', 'Settups\Bar\BarAsignController@index');
    Route::post('/item-bar/{id}/delete', 'Settups\ItemController@destroy');


    //restaurant settup
    Route::get('/settup/restaurant', 'Settups\Restaurant\RestaurantController@index');
    Route::post('/settup/restaurant', 'Settups\Restaurant\RestaurantController@store');
    Route::post('/rest/action','Settups\Restaurant\RestaurantController@action')->name('rest.action');

    Route::get('/settup/restaurant/meal-type', 'Settups\Restaurant\MealTypeController@index');
    Route::get('/settup/restaurant/assign-staff', 'Settups\Restaurant\RestaurantAsignController@index');

    //Restaurant Pos
    Route::get('/res/service/pos', 'Restaurant\PosController@index');
    Route::get('/res/kot', 'Restaurant\PosController@kot');
    Route::post('/res/kot', 'Restaurant\PosController@store');
    Route::post('/bar/kot', 'Restaurant\PosController@Barstore');

    Route::post('/res/bill', 'Restaurant\PosController@storeBill');
    Route::post('/res/filter', 'Restaurant\PosController@filter');
    Route::get('/res/service/report', 'Restaurant\PosController@report');
    Route::get('/bar/service/report', 'Settups\Bar\PosController@report');
    Route::get('/bar/service/{id}/{qr}/show', 'Settups\Bar\PosController@showReport');

    Route::get('/res/service/create-bill', 'Restaurant\PosController@createBill');
    Route::get('/res/service/{id}/{qr}/show', 'Restaurant\PosController@showReport');

    //restaurant request
    Route::get('/rest/request/{id}/receive', 'Restaurant\RequestController@receive');

    Route::get('/rest/request/all', 'Restaurant\RequestController@allRequest');
    Route::get('/rest/request/{id}/show', 'Restaurant\RequestController@show');
    
    Route::post('/requestEdit/actionReceived','Restaurant\RequestController@actionReceived')->name('requestEdit.actionReceived');


    Route::resource('/rest/request', 'Restaurant\RequestController');
    Route::post('/rest/request/store', 'Restaurant\RequestController@store');
    Route::post('/rest/request/prepare', 'Restaurant\RequestController@prepare');
    Route::post('/rest/request/requestEdit', 'Restaurant\RequestController@requestEdit')->name('requestEdit.action');

    Route::get('/rest/bill/create', 'Restaurant\CreateBill@index');
    Route::get('/rest/bill/{id}/{ids}/show', 'Restaurant\CreateBill@show');

    //Bar Pos
    Route::get('/bar/service/pos', 'Settups\Bar\PosController@index');
    Route::get('/barCate', 'Settups\Bar\PosController@barCate');
    
    //table
    Route::get('/settup/restaurant/table', 'Restaurant\TableController@index');
    Route::post('/settup/restaurant/table', 'Restaurant\TableController@store');
    Route::post('/table/action', 'Restaurant\TableController@actionT')->name('table.action');


    // dish category
    Route::get('/settup/restaurant/food-category', 'Restaurant\DishController@index');
    Route::post('/foodCategory/faction', 'Restaurant\DishController@requestEdit')->name('foodCategory.action');

    Route::get('/dishCate', 'Restaurant\DishController@dishCate');
    Route::post('/settup/restaurant/dish-category', 'Restaurant\DishController@store');
    
    //dish Menu
    Route::get('/settup/restaurant/food', 'Settups\Restaurant\FoodRestaurantController@index');
    Route::post('/settup/restaurant/food', 'Settups\Restaurant\FoodRestaurantController@store');
    Route::post('/food/faction', 'Settups\Restaurant\FoodRestaurantController@action')->name('food.action');


    //conference settup
    Route::post('/confe/action','Settups\Conference\ConferenceController@confeAction')->name('confe.action');

    Route::resource('/settup/conference', 'Settups\Conference\ConferenceController');
    // Route::get('/settup/conference/status', 'Settups\Conference\StausConferenceController@index');


    //finace settup
    Route::get('/settup/finance/payment-mode', 'Settups\Finance\PaymentModeController@index');



    Route::get('/settup/staff', 'Settups\Staff\StaffController@index');
    Route::post('/settup/staff', 'Settups\Staff\StaffController@store');

    Route::get('/settup/store/current-status', 'Settup\Store\BarController@currentStock');
    Route::get('/settup/store/current/{id}/show', 'Settup\Store\StoreController@showCurrent');

    Route::resource('/settup/store/bar', 'Settup\Store\BarController');

    Route::resource('/settup/store/other', 'Settup\Store\OtherController');


    Route::get('/settup/store/issue', 'Settup\Store\StoreController@issue');
    Route::get('/settup/store/rest/req', 'Settup\Store\StoreController@req');
    Route::post('/settup/store/issue', 'Settup\Store\StoreController@storeIssue');
    Route::post('/settup/store/issue/prepare', 'Settup\Store\StoreController@issuePrepare');
    Route::get('/settup/store/issue/all', 'Settup\Store\StoreController@allIssue');
    Route::get('/settup/store/issue/{id}/edit', 'Settup\Store\StoreController@issueEdit');
    Route::post('/issueEditList/action','Settup\Store\StoreController@issueEditList')->name('issueEditList.action');
    Route::get('/settup/store/issue/{id}/receive', 'Settup\Store\StoreController@issueReceive');
    Route::post('/tabledit/issueReceived','Settup\Store\StoreController@issueReceived')->name('tabledit.issueReceived');

    Route::get('/settup/store/item', 'Settup\Store\StoreController@item');
    Route::get('/settup/store/item-category', 'Settup\Store\StoreController@itemCategory');
    Route::post('/settup/store/item-category', 'Settup\Store\StoreController@storeCategory');

    Route::post('/settup/store/item', 'Settup\Store\StoreController@storeItem');
    Route::post('/itemEdit/action','Settup\Store\StoreController@itemAction')->name('itemEdit.action');
    Route::post('/categoryEdit/action','Settup\Store\StoreController@categoryEdit')->name('categoryEdit.action');

    Route::get('/settup/store/report', 'Settup\Store\ReportController@index');
    Route::post('/settup/store/report/filterReportDay', 'Settup\Store\ReportController@filterReportDay');

    Route::resource('/settup/store', 'Settup\Store\StoreController');
    Route::post('/settup/store/prepare', 'Settup\Store\StoreController@prepare');
    Route::get('/settup/store/{id}/show', 'Settup\Store\StoreController@show');
    Route::get('/settup/store/{id}/edit', 'Settup\Store\StoreController@edit');
    Route::get('/settup/store/{id}/receive', 'Settup\Store\StoreController@receive');
    Route::post('/tabledit/action','Settup\Store\StoreController@action')->name('tabledit.action');
    Route::post('/tabledit/actionReceived','Settup\Store\StoreController@actionReceived')->name('tabledit.actionReceived');


    Route::post('/settup/action', 'Settup\Store\StoreController@action')->name('settup.action');


    //videos and images

    Route::get('/video/service/booking', 'VideoImages@index');
    Route::post('/video/service/image-customer', 'VideoImages@store');
    Route::get('/video/service/booking-list', 'VideoImages@create');
    // reports

    Route::get('/acc/service/report', 'Accomodation\CustomerListController@acc_report');
    Route::get('/acc/service/customer-view/{id}/report', 'Accomodation\CheckInController@showForReport');
    Route::get('/confe/service/report', 'ConferenceController@report');
    Route::get('/payments/service/report', 'Accomodation\ReveivePaymentController@report_payment');
    Route::get('/payments/service/hotel-income', 'Accomodation\ReveivePaymentController@report_hotel_income');
    Route::get('/rest/bill/room-sales', 'Accomodation\ReveivePaymentController@report_room_sales');
});