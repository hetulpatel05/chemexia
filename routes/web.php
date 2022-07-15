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
    return view('welcome');
});

Route::get('/', function () {
    return view('Auth.login');
})->name('login');


Route::post('checklogin','AuthController@checklogin')->name('check-login');


//After Login Routes
Route::group(['middleware' => 'auth'], function () {

Route::any('upload_data','IndexController@upload_data');

Route::get('dashboard','IndexController@dashboard');  //For displaying Dashboard
Route::get('berichten','UserController@berichten');  //For displaying the all Users
Route::get('/logout', 'AuthController@logout');

//Manage Users
Route::get('users','UserController@showusers');  //For displaying the all Users
Route::get('user/edit/{id}','UserController@edituser')->name('edit-user');
Route::any('updateuser/{id}','UserController@updateuser')->name('user-update');
Route::any('delete-user/{id}','UserController@deleteuser')->name('delete-user');

//Manage Inquiries
Route::get('inquiries','InquiryController@show');  //For displaying the all Users
Route::any('approve-quote/{id}','InquiryController@approvequote')->name('approve-quote');

//Manage Category
Route::get('managecategory','CategoryController@showcategory');  //For displaying the all Users
Route::get('newcategory','CategoryController@viewform');  //For displaying the all Users
Route::post('savecategory','CategoryController@save')->name('category-save');
Route::get('category/edit/{id}','CategoryController@editcategory')->name('edit-category');
Route::any('delete-category/{id}','CategoryController@deletecategory')->name('delete-category');
Route::any('updatecategory/{id}','CategoryController@updatecategory')->name('category-update');

//Manage SubCategory
Route::get('managesubcategory','SubCategoryController@show');  //For displaying the all Users
Route::get('newsubcategory','SubCategoryController@viewform');  //For displaying the all Users
Route::post('savesubcategory','SubCategoryController@save')->name('subcategory-save');
Route::any('delete-subcategory/{id}','SubCategoryController@deletesubcategory')->name('delete-subcategory');
Route::get('subcategory/edit/{id}','SubCategoryController@editsubcategory')->name('edit-subcategory');
Route::any('subupdatecategory/{id}','SubCategoryController@updatesubcategory')->name('subcategory-update');


//Manage Sales
Route::get('viewsales','SalesController@show');  //For displaying the all Users

//Manage Pdf's
Route::get('viewpdflist','PdfController@showpdf');  //For displaying the all Users
Route::post('savepdf','PdfController@save')->name('pdf-save');
Route::get('newpdf','PdfController@viewform');  //For displaying the all Users
Route::any('delete-pdf/{id}','PdfController@deletepdf')->name('delete-pdf');


});