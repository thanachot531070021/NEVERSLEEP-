<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class BackofficeController extends Controller
{
    

    // /**
    //  * Show the application dashboard.
    //  *
    //  * @return \Illuminate\Contracts\Support\Renderable
    //  */


     public function index()
    {
      $product = Product::all();

        return view('Backoffice', compact('product'));
    }

  

}
