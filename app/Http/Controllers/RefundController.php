<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cash_registers;
use App\Product;

class RefundController extends Controller
{
      public function show($id)
    {
        $Cash_registers = Cash_registers::all();
        $Cash = Cash_registers::all();
        $Product = Product::find($id);


        $ProductPrice = $Product->price;
        dd(CashIN);

        $money_typeA=0;
        $amountA=0;

        $typecount = array();


    //   dd($Cash[0]->pricesum);


        for($i=0;$i<=9;$i++)
        {
            if($Cash[$i]->amount <=0){
                $typecount[$i]=0;
                continue;
            }
            else{
                for($j=1;$j<=$Cash[$i]->amount;$j++){
                    if ($CashIN=$CashIN-$Cash[$i]->money_type = 0){
                        continue;
                    }else{
                        $CashIN=$CashIN-($Cash[$i]->money_type);
                        $typecount[$i]=$j;
                    }


                }
            }
        }

    // dd($Cash_registers);


//   foreach ($Cash_registers as $Case)
//     {
//         $money_typeA= $money_typeA+ $Case->money_type;
//         $amountA = $amountA+ $Case->amount;
//     }

         return view('refund.form',compact('Cash_registers'));
    }



    


}
