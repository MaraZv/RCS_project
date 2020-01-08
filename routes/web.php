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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'InvoiceController@countAll');

Route::get('/dashboard', 'InvoiceController@dashData')->middleware('auth');

//Invoice routes
Route::get('/invoices', 'InvoiceController@invoice')->middleware('auth');
Route::get('/invoice/{invoice}', 'InvoiceController@single')->middleware('auth');
Route::post('/invoices/invoiceNew', 'InvoiceController@submit')->middleware('auth');

//Income routes
Route::get('incomes', 'IncomeController@income')->middleware('auth');
Route::get('/income/{id}', 'IncomeController@single')->middleware('auth');
Route::post('/incomes/incomeNew', 'IncomeController@submit')->middleware('auth');

// PDF generation
Route::get('/pdf', 'InvoiceController@pdftest')->middleware('auth');
Route::get('/invoice/{invoice}/generatePDF', 'InvoiceController@pdftest')->middleware('auth');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
