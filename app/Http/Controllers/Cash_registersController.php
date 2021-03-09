<?php

namespace App\Http\Controllers;
use App\Http\Requests\Cash_registersRequest;
use Illuminate\Http\Request;
use App\Cash_registers;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Cash_registersController extends Controller
{
     public function index()
    {
      $Cash_registers = Cash_registers::all();

        return view('Cash_registers', compact('Cash_registers'));
    }

    public function edit($id)
    {
        $Cash_registers = Cash_registers::where('id' , $id)
            ->firstOrFail();


        return view('cash.form', compact('Cash_registers'));
    }


     public function update(Cash_registersRequest $request, $id)
    {


            $Cash_registers = Cash_registers::find($id);
            $Cash_registers->amount = $request->amount;
            $Cash_registers->pricesum = $request->pricesum;
            $Cash_registers->save();

            return redirect()->route('cash_registers.index');


    }
}
