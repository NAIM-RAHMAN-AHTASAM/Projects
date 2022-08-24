<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Faq;
use App\Quote;
use Carbon\Carbon;
use App\Http\Requests\FaqFormPost;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     // public function apiGetQuote(){
     //   $getList = Quote::all();
     //   return response()->json($getList);
     // }


// User part Start

    public function index()
    {

        // $users= User::orderBy('name','asc')->get();
        // $users= User::all();
        // $total_user=User::count();
        $logged_user_id = Auth::id();
        $users= User::Where('id','!=',$logged_user_id)->orderBy('name','asc')->paginate('4');
        return view('home', compact('users'));
    }

// User part End


// Quote part start

    Public function addquote(){
      $quotes = Quote::paginate('4');

      return view('admin.addquote',compact('quotes'));
    }
    Public function addquotepost(Request $request){
    Quote::insert([
        'quote_des'=>$request->quote_des,
        'quote_name'=>$request->quote_name,
        'created_at'=> Carbon::now(),
        ]);
      return back()->with('status_quote_add','Quote Added Successfully');
    }

    public function editquote($quote_id)
    {

      $quotes = Quote::find($quote_id);

        return view('admin.editquote',compact('quotes'));
    }

    public function editquotepost(Request $request)
    {

     Quote::find($request->quote_id)->update([
       "quote_des"=>$request->quote_des,

     ]);

      return redirect('/add/quote')->with('status_quote_edit','Update Successfully');
    }



    public function quotedelete($quote_id)
    {

      Quote::find($quote_id)->delete();
      return back()->with('status_quote_deleted','Deleted Successfully');
    }
// Quote part end




// Faq part start

    public function addfaq()
        {
          $trashfaqs= Faq::onlyTrashed()->paginate('4');


          $faqs=Faq::paginate(4);

          return view('admin.addfaq', compact('faqs','trashfaqs'));
        }
    public function addfaqpost(FaqFormPost $request)

        {


          Faq::insert([
            'faq_question'=>$request->faq_question,
            'faq_answer'=>$request->faq_answer,
            'created_at'=> Carbon::now(),
            ]);
          return back()->with('status','Successfully added');
        }
        public function faqdelete($faq_id)
        {
            Faq::find($faq_id)->delete();
            return back()->with('statusdeleted','Deleted Successfully');
        }
        public function faqedit($faq_id)

        {
          $faqs= Faq::find($faq_id);

            return view('admin.editfaq',compact('faqs'));
        }

        public function faqeditpost(Request $request)

        {

          Faq::find($request->faq_id)->update([
            "faq_question"=>$request->faq_question,
            "faq_answer"=>$request->faq_answer,
          ]);
          return back()->with('editstatus','Edited Successfully');
          // return redirect('/add/faq')->with('editstatus','Edited Successfully');
        }

      Public function faqrestore($faq_id){
      Faq::withTrashed()->where('id', $faq_id)->restore();
        return back()->with('trashstatus','Restore Successfully');
      }
      Public function faqharddelete($faq_id){

      Faq::withTrashed()->where('id', $faq_id)->forceDelete();
        return back();

      // Faq::withTrashed()->where('id', $faq_id)->restore();
      //   return back()->with('trashstatus','Restore Successfully');
      }


// Quote part end


// logout part start
    Public function  logout(){

      Auth::logout();
        return redirect('/login');


    }

// logout part End

}
