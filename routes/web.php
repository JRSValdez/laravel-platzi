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

Route::get('/', 'HomeController@index');

//expnse reports resources
Route::resource('/expense_reports','ExpenseReportController');
Route::get('/expense_reports/{id}/delete', 'ExpenseReportController@delete');

//send by mail
Route::get('/expense_reports/{expense_report}/confirmSendMail', 'ExpenseReportController@confirmSendMail');
Route::post('/expense_reports/{expense_report}/sendMail', 'ExpenseReportController@sendMail');


//expense routes
Route::get('/expense_reports/{expense_report}/expenses/create', 'ExpenseController@create');
Route::post('/expense_reports/{expense_report}/expenses', 'ExpenseController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
