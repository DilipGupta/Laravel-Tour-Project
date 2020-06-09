<?php

use Illuminate\Support\Facades\Auth;
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

Route::resource('/','HomeController');

// Route::resource('subscribe','HomeController@subscribe');
// Route::resource('subscribe','subscribeController');
Route::resource('subscribe','subscribeController');

// Route::get('/package/{url}','packageController@index');
// Route::group(['prefix'=>'/package'], function(){
//     Route::get('/{url}', function(){
//         return view('package');
//     })->name('{url}');
// });
Route::get('/package/{url}','packageController@index');

Route::get('/package/{url}/detail/{id}','packageController@show');
// Route::resource('/package/{url}','packageController');

Route::resource('/about-us', 'aboutUsController');

Route::resource('/gallery', 'galleryController');

Route::resource('/contact-us', 'contactUsController');



Auth::routes();

Route::GET('/admin/home','Admin\AdminHomeController@index')->name('admin.home');

Route::GET('/admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('/admin','Admin\LoginController@login');

Route::GET('/admin/login','Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('/admin/login','Admin\LoginController@login');

Route::POST('/admin/logout','Admin\LoginController@logout')->name('admin.logout');

Route::GET('/admin/register','Admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::POST('/admin/register','Admin\RegisterController@register')->name('admin.register');

Route::GET('/admin/verify/{email}/{verifyToken}','Admin\RegisterController@sendAdminEmail')->name('admin.sendAdminEmail');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::GET('admin-password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');

Route::resource('/admin/package-categories','admin\packageCategoriesController');
Route::resource('/admin/package','admin\packageController');
Route::resource('/admin/photo-gallery','admin\photoGalleryController');
Route::resource('/admin/package-days','admin\packageDaysController');
Route::resource('/admin/testimonial','admin\testimonialController');
Route::resource('/admin/enquiry','admin\enquiryController');
Route::resource('/admin/change-password','admin\changePasswordController');
