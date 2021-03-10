@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-2 text-center">
                    <div class="container">
  <h1 id="sumcoins">จำนวนเงิน 0 บาท</h1>
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
</div>

            </div>
            <table id="datatabel" class="table table-bordered bg-white table-hover" >
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>คงเหลือ</th>
                        <th>สั่งชื้อ</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product  as $indexKey => $product)
                    <tr>
                        <td>{{ $indexKey+1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                           <a class="btn btn-success invisible"  id="btn_price{{$indexKey+1}}"   href="{{ route('product.edit', $product->id) }}">ซื้อ</a>
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
