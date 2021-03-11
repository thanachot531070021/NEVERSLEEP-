<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Machine;
use App\Product;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::user()){
        return Redirect('/login');
      }
        $product = Product::all()
                    ->where('stock','>',1);

        return view('machine', compact('product'))->withTitle(Auth::user()->role);

    }

    
    public function update(TopicRequest $request, $id)
    {
        $topic = Topic::where('id' , $id)
            ->firstOrFail();

        $topic->title = $request->title;
        $topic->content = $request->content;
        $topic->save();

        return back()->with('save_status', [
            'message' => 'Update success',
            'status' => 'success'
        ]);
    }

    public function handleAjax (Request $request)
{
    dd($request->all());
    // You will get your json as array data => [ 'data_1' => 'data1_value', 'data_2' => 'data2_value'];

    // calculate and return your result as json and send emal;
    // send mail using [Laravel Events](https://laravel.com/docs/5.2/events)
    
    $result=1111;
    return ($result);
}

}
