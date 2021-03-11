<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Product;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;



class ProductController extends Controller
{
      public function index()
    {
        if (!Auth::user()){
        return Redirect('/login');
        }else
        if(Auth::user()->role==0){
            return Redirect('/machine');
        }else{
        $product = Product::all();
        return view('backoffice', compact('product'));
        }
    }


      public function create()
    {
          if (!Auth::user()){
        return Redirect('/login');
        }else
        if(Auth::user()->role==0){
            return Redirect('/machine');
        }else{
        return view('product.form');
        }
    }

     public function store(ProductRequest $request)
    {
        $product = new Product();
        $product->create($request->only(['product_name', 'price', 'stock']));
        return redirect()->route('backoffice.index');
    }

    public function edit($id)
    {
        $product = Product::where('id' , $id)
            ->firstOrFail();


        return view('product.form', compact('product'));
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }






    public function update(ProductRequest $request, $id)
    {


            $product = Product::find($id);
            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->stock =$request->stock;
            $product->updated_at=now();
            $product->save();
        //     return back()->with('save_status', [
        //     'message' => 'แก้ไขรายการสินค้าแล้ว',
        //     'status' => 'success'
        // ]);

            return redirect()->route('backoffice.index');


    }


    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return back()->with('save_status', [
            'message' => 'ลบรายการสินค้าแล้ว',
            'status' => 'danger'
        ]);
    }



    function checkrole(){

    }

}
