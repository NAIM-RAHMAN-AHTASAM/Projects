<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Quote;

class FrontendController extends Controller
{
  public function getquotelist(){
  $getquotelists =  Quote::inRandomOrder()->limit(5)->get();

  return view('layouts.frontendquote',compact('getquotelists'));
  }
  public function getQuotelistAjax(){
  $getquotelists =  Quote::inRandomOrder()->limit(5)->get();
  return $getquotelists;
  }
  public function search(){
    $search_text = $_GET['quote_name'];
    $quotes = Quote:: where('quote_name','LIKE',  $search_text)->get();
    return view('admin.search',compact('quotes'));
  }
  public function apiGetQuote(){
    $getList = Quote::all();
    return response()->json($getList);
  }

  public function postQuote(Request $request){
    $book = new Quote;
      $book->quote_des = $request->quote_des;
      $book->quote_name = $request->quote_name;
      $book->save();
      return response()->json([
          "message" => "Quote Added."
      ], 201);
  }


















    function index(){
      return view('welcome');
    }
    function about(){
      return view('about');
    }

}
