<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;

class BackofficeController extends Controller
{
    

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */


     public function index()
    {

      if (!Auth::user()){
        return Redirect('/login');
      }else
      if(Auth::user()->role==0){
        return Redirect('/machine');
      }else{
      $product = Product::all();

        return view('Backoffice', compact('product'));
      }
    }

  

}
