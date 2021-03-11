@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-2 text-center">
                    <div class="container">
  <h1 id="sumcoins">จำนวนเงิน 0 บาท</h1>
  <h1 id="sumcoins2" class="invisible">0</h1>
  <h1 id="returncoins">จำนวนเงินที่คืน 0 บาท</h1>

</div>

<div class="container">
    <button type="button" id="1" class="btn btn-primary">1</button>
    <button type="button" id="2" class="btn btn-primary">2</button>
    <button type="button" id="5" class="btn btn-primary">5</button>
    <button type="button" id="10" class="btn btn-primary">10</button>
    <button type="button" id="20" class="btn btn-primary">20</button>
    <button type="button" id="50" class="btn btn-primary">50</button>
    <button type="button" id="100" class="btn btn-primary">100</button>
    <button type="button" id="500" class="btn btn-primary">500</button>
    <button type="button" id="1000" class="btn btn-primary">1000</button>

    <button type="button" id="clean_coins" class="btn btn-danger">ยกเลิก</button>
    <button type="button" id="Backoffice" class="btn btn-warning invisible">Backoffice</button>
    <span class="invisible" id="role" name="role">   {{$title}}    </span>
</div>

            </div>
            <table id="datatabel" class="table table-bordered bg-white table-hover" >
                <thead>
                    <tr>
                        <th  id="col1" >ลำดับ</th>
                        <th  id="col2" >ชื่อสินค้า</th>
                        <th  id="col3" >ราคา</th>
                        <th  id="col4" >คงเหลือ</th>
                        <th  id="col5" >สั่งชื้อ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product  as $indexKey => $product)
                    <tr id="{{ $indexKey+1 }}">
                        <td >{{ $indexKey+1 }}</td>
                        <td >{{ $product->product_name }}</td>
                        <td >{{ $product->price }}</td>
                        <td >{{ $product->stock }}</td>
                        <td>
                           <button class="btn btn-success invisible btnSelect"  id="btn_price{{$indexKey+1}}" value="submit"  onclick="myFunction()">ซื้อ </button>
                        </td>
                         <td hidden id="price{{$indexKey+1}}" name="price{{$indexKey+1}}">btn_price{{$indexKey+1}}</td>


                    </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>

</div>



@endsection



@section('script')



<script>
//*


</script>


<script>



$(document).ready(function() {
    let num1 = 0;
    let sumstring = '';
    let returnstring = 'จำนวนเงินที่คืน 0 บาท';


    $("#datatabel").on('click','.btnSelect',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         var colPrice=currentRow.find("td:eq(2)").html(); // get current row 3rd table cell  TD value
         var cashtotal = $('#sumcoins2').text();
         var t=(cashtotal-colPrice);
         	$('#returncoins').text('จำนวนเงินที่คืน '+ parseInt(t) +' บาท');

             num1=0;
			var arrData =[];
				arrData=Gettabel();
			jQuery.each( arrData, function( i, val ) {
				if (i === 0) return;

					$("#"+ val.col2).removeClass("visible");
					$("#"+ val.col2).addClass("invisible");

			});
             
             setTimeout(function () {
				$('#sumcoins').text('จำนวนเงิน 0 บาท');
				$('#returncoins').text('จำนวนเงินที่คืน 0 บาท');
			}, 1000);



            
    });



    if($('#role').text()==1){
        $('#Backoffice').removeClass( "invisible" );
    }

    $('button').on('click', function(e) {
		 if (e.target.id == 'clean_coins') {
			sumstring='จำนวนเงิน 0 บาท'
			returnstring='จำนวนเงินที่คืน '+num1+' บาท'
			num1=0;
			$('#sumcoins').text(sumstring);
			$('#sumcoins2').text(num1);            
			$('#returncoins').text(returnstring);

			var arrData =[];
				arrData=Gettabel();
			jQuery.each( arrData, function( i, val ) {
				if (i === 0) return;

					$("#"+ val.col2).removeClass("visible");
					$("#"+ val.col2).addClass("invisible");

			});

			setTimeout(function () {
				$('#returncoins').text('จำนวนเงินที่คืน 0 บาท');
			}, 2000);



    }else if (e.target.id == 'Backoffice') {
            window.location.href = "/backoffice";
    }
    else if(e.target.id <=1000) {

        let num2 = e.target.innerHTML;
        num1=parseInt(num1)+parseInt(num2);

        sumstring='จำนวนเงิน '+num1+' บาท'
        $('#sumcoins').text(sumstring);
        $('#sumcoins2').text(num1);
        

		var arrData =[];
			arrData=Gettabel();


	jQuery.each( arrData, function( i, val ) {
		if (i === 0) return;
	if(parseInt(val.col1)<=num1){;
		$("#"+ val.col2).removeClass("invisible");
		$("#"+ val.col2).addClass("visible");

	}else{
		$("#"+ val.col2).removeClass("visible");
		$("#"+ val.col2).addClass("invisible");

	}

	});
    }

});


});
function getCell(column, row) {
    var column = $('#' + column).index();
    var row = $('#' + row)
    return row.find('td').eq(column);
}

function Gettabel(){
	var arrDataTabel=[];
	// loop over each table row (tr)
	$("#datatabel tr").each(function(){
        var currentRow=$(this);

        var col1_value=currentRow.find("td:eq(2)").text();
		var col2_value=currentRow.find("td:eq(5)").text();


         var obj={};
        obj.col1=col1_value;
        obj.col2=col2_value;

        arrDataTabel.push(obj);
   });
   return arrDataTabel;
}
</script>

@endsection