@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="mb-2 text-right">
            <a class="btn btn-warning" href="{{ route('cash_registers.index') }}">จัดการเงินทอน</a>
            <a class="btn btn-success" href="{{ route('product.create') }}">เพิ่มสินค้า</a>
            </div>
            <table class="table table-bordered bg-white table-hover">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($product  as $indexKey => $product)
                    <tr>
                        <td>{{ $indexKey+1 }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td>
                           <a class="btn btn-warning"href="{{ route('product.edit', $product->id) }}">แก้ไข</a>
                        </td>
                        <td>
                                <form method="POST" action="{{route('product.destroy', $product->id)}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="ลบ">
                                </div>
                            </form>
                        </td>

                    </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
