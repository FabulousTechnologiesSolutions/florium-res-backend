<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['AdminMiddleware']], function () {
    Route::prefix('admin')->group(function(){
        Route::controller(AdminController::class)->group(function(){
            Route::get('dashboard','countt')->name('admin.dashboard');

            Route::get('managerestaurant','managerestaurant')->name('admin.managerestaurant');
            Route::get('addrestaurant','addrestaurant')->name('admin.addrestaurant');
            Route::post('saverestaurant','saverestaurant')->name('admin.saverestaurant');
            Route::get('editrestaurant/{id}','editrestaurant')->name('admin.editrestaurant');
            Route::post('updaterestaurant', 'updaterestaurant')->name('admin.updaterestaurant');
            Route::get('deleterestaurant/{id}','deleterestaurant');

            Route::get('restaurantdetail/{id}','restaurantdetail')->name('admin.restaurantdetail');
            Route::get('managereviews','managereviews')->name('admin.managereviews');
            Route::get('deletereview/{id}','deletereview');

            Route::get('managefaq','managefaq')->name('admin.managefaq');
            Route::get('addfaq','addfaq')->name('admin.addfaq');
            Route::post('savefaq','savefaq')->name('admin.savefaq');
            Route::get('editfaq/{id}','editfaq')->name('admin.editfaq');
            Route::post('updatefaq', 'updatefaq')->name('admin.updatefaq');
            Route::get('deletefaq/{id}','deletefaq');


            Route::get('manageabout','manageabout')->name('admin.manageabout');
            Route::post('updateabout', 'updateabout')->name('admin.updateabout');


            Route::get('managefood','managefood')->name('admin.managefood');
            Route::get('addfood','addfood')->name('admin.addfood');
            Route::post('savefood','savefood')->name('admin.savefood');
            Route::get('editfood/{id}','editfood')->name('admin.editfood');
            Route::post('updatefood', 'updatefood')->name('admin.updatefood');
            Route::get('deletefood/{id}','deletefood');

            Route::get('managecontact','managecontact')->name('admin.managecontact');
            Route::post('updatecontact', 'updatecontact')->name('admin.updatecontact');
            Route::get('fromqueries','fromqueries')->name('admin.fromqueries');
            Route::get('deletequery/{id}','deletequery');


        });
    });
});


Route::controller(WebController::class)->group(function(){
    Route::get('about','about')->name('about');
    Route::get('contact','contact')->name('contact');
    Route::post('send','send')->name('send');
    Route::get('details/{id}','details')->name('details');
    Route::get('/','index')->name('/');
    Route::post('searchfilter','searchfilter')->name('searchfilter');
    Route::get('detailssearch','detailssearch');
});

Route::group(['middleware' => ['UserMiddleware']], function () {
    Route::controller(WebController::class)->group(function(){
    Route::post('sendreview','sendreview')->name('sendreview');
    Route::post('restaurantreview','restaurantreview')->name('restaurantreview');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
