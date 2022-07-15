<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('test','AuthController@test');

//Authentication
Route::post('login','api\AuthController@login');
Route::post('registeruser','api\AuthController@registeruser');
Route::post('verifyotp','api\AuthController@verifyotp');
Route::post('sendverificationcode','api\AuthController@sendverificationcode'); // Forgot Password

//After Login Route
Route::group(['middleware' => 'jwt.auth'], function () {

//Manage Profile

Route::get('viewuserprofile','api\UserController@viewuserprofile');  //View UserProfile
Route::post('updateprofile','api\UserController@updateprofile');  //Update Profile

// Manage Sell Material
Route::post('addsellmaterial','api\SellController@savesellmaterial');  //save sell materials
Route::get('viewsellmaterial','api\SellController@viewsellmaterial');  //View sell Materials


//Manage Quatation
Route::post('addquotation','api\QuotationController@addquotation');  //save sell materials
Route::get('viewquotation','api\QuotationController@viewquotation');  //View sell Materials


//Manage Category
Route::get('viewcategory','api\CategoryController@viewcategory');  //View Home Page Categories

Route::get('viewallcategory','api\CategoryController@viewallcategory');  //View Home Page Categories
Route::post('searchallcategory','api\CategoryController@searchallcategory');  //View New Categories with search


Route::post('viewsubcategory','api\SubCategoryController@viewsubcategory');  //View Home Page Categories

//Manage Pdf's
Route::get('viewpdflist','PdfController@displaypdf');

//Logout
Route::post('logout','api\AuthController@logout');

});
