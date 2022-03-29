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

//########################Authintication Routes will goes here#######################
Route::get('/', 'App\Http\Controllers\Auth\LoginController@index')->name('login');
Route::post('/', 'App\Http\Controllers\Auth\LoginController@authenticate')->name('login.store');
Route::get('/logout',function(){
   \Auth::logout();
   return redirect('/');
})->name('logout');

Route::group(['middleware'=>'auth','namespace' => 'App\Http\Controllers'],function(){
   Route::get('/dashboard','DashboardController@index')->name('dashboard');
   /***********************Bread Type Routes ************************/
   Route::get('bread-types','BreadTypeController@index')->name('bread.types');
   Route::get('bread-delete/{id}','BreadTypeController@destroy')->name('bread.delete');
   Route::post('bread-store','BreadTypeController@store')->name('bread.store');
   Route::post('bread-update','BreadTypeController@update')->name('bread.update');
     /***********************End Bread Type Routes ************************/
   /* <Resturant routes> */
   Route::get('resturants','ResturantController@index')->name('resturants');
   Route::get('resturants-delete/{id}','ResturantController@destroy')->name('resturants.delete');
   Route::post('resturants-store','ResturantController@store')->name('resturants.store');
   Route::post('resturants-update','ResturantController@update')->name('resturants.update');
   /* <End Resturant routes> */
    /* <Bakers routes> */
    Route::get('bakers','BakerController@index')->name('bakers');
    Route::get('bakers-delete/{id}','BakerController@destroy')->name('bakers.delete');
    Route::post('bakers-store','BakerController@store')->name('bakers.store');
    Route::post('bakers-update','BakerController@update')->name('bakers.update');
    /* <End Bakers routes> */

      /* <Resturant routes> */
   Route::get('sheets','SheetController@index')->name('sheets');
   Route::get('sheets-delete/{id}','SheetController@destroy')->name('sheets.delete');
   Route::post('sheets-store','SheetController@store')->name('sheets.store');
   Route::post('sheets-update','SheetController@update')->name('sheets.update');
   /* <End Resturant routes> */

     /* <Assined Bread to Resturants Routes> */
     Route::get('assigned-breads','AssignedBreadController@index')->name('assigned.breads');
     Route::get('assigned-breads-create/{sheet}','AssignedBreadController@create')->name('assigned.breads.create');
     Route::get('assigned-breads-delete/{id}','AssignedBreadController@destroy')->name('assigned.breads.delete');
     Route::post('assigned-breads-store','AssignedBreadController@store')->name('assigned.breads.store');
     Route::post('assigned-breads-update','AssignedBreadController@update')->name('assigned.breads.update');
     Route::get('delete-assigned-type/{id}','AssignedBreadController@deleteAssignedType')->name('assignedType.delete');
     /* <End Assined Bread to Resturants Routes> */
});
