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




Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','Maintenance' ]], function()
{


    Route::get('/', 'Front\FrontController@index')->name('home');

    Route::get('clients', 'Front\FrontController@getClients')->name('clients');


    Route::get('order', 'Admin\Orders@getOrder');
    Route::post('order', 'Admin\Orders@postOrder')->name('front.order');


    Route::get('contact', 'Front\Contacts@getContact')->name('contact');
    Route::post('contact', 'Front\Contacts@postContact')->name('front.contact');
});



    //maintenance status

    Route::get('maintenance', function () {

        if(setting()->system_status == 'open'){

            return redirect('/');
        }

        return view('front.maintenance');
    });


