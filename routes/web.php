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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route:: get('/add/faq','HomeController@addfaq');
Route:: post('/addfaq/post','HomeController@addfaqpost');
Route:: get('/faq/delete/{faq_id}','HomeController@faqdelete');
Route:: get('/faq/edit/{faq_id}','HomeController@faqedit');
Route:: post('/faq/edit/post','HomeController@faqeditpost');
Route:: get('/faq/restore/{faq_id}','HomeController@faqrestore');
Route:: get('/faq/harddelete/{faq_id}','HomeController@faqharddelete');


Route:: get('/add/quote','HomeController@addquote');
Route:: post('/add/quote/post','HomeController@addquotepost');
Route:: get('quote/edit/{quote_id}','HomeController@editquote');
Route:: post('quote/edit/post','HomeController@editquotepost');
Route:: get('quote/delete/{quote_id}','HomeController@quotedelete');


Route:: get('logout','HomeController@logout');



Route:: get('/','FrontendController@index');
Route:: get('/about','FrontendController@about');


Route:: get('/get/quote/list','FrontendController@getquotelist');
Route:: get('/get/quote/list/ajax','FrontendController@getQuotelistAjax');
Route:: get('/search','FrontendController@search');
