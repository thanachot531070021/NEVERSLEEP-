@extends('layouts.app')
@section('content')

@php
    $isCreate = Request::route()->getName() == 'product.create';
@endphp

<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            @if (session()->has('save_status'))
            <div class="alert alert-{{ session()->get('save_status')['status'] }}">
                {{ session()->get('save_status')['message'] }}
            </div>
            @endif
             <form class="card" method="{{$isCreate ? 'post' : 'post'}}" action="{{ $isCreate ? route('product.store') : route('product.update', $product->id ?? 0) }}">
                @if (!$isCreate)
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                @endif
                @if ($isCreate)
                     @method($isCreate ? 'post' : 'put')
                    @csrf
                @endif
                <div class="card-header">
                    <h3 class="card-title">{{ $isCreate ? 'เพื่ม' : 'แก้ไข' }}สินค้า</h3>
                </div>


                <div class="card-body">
                    <div class="form-group">
                        <label for="product_name">ชื่อสินค้า</label>
                        <input value="{{ $product->product_name ?? ''  }}" name="product_name" id="product_name" value="{{ $product->product_name ?? '' }}" class="form-control {{ $errors->has('$product_name') ? 'is-invalid' : '' }}" ></input>
                        <span class="invalid-feedback">{{ $errors->first('product_name') }}</span>
                    </div>
                     <div class="form-group">
                        <label for="price">ราคา</label>
                        <input value="{{ $product->price ?? '' }}" type="number" name="price" id="price" value="{{ $product->price ?? '' }}" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" ></input>
                        <span class="invalid-feedback">{{ $errors->first('price') }}</span>
                    </div>
                     <div class="form-group">
                        <label for="stock">จำนวนสินค้า</label>
                        <input value="{{ $product->stock ?? ''  }}"  type="number" name="stock" id="stock" value="{{ $product->stock ?? '' }}" class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" ></input>
                        <span class="invalid-feedback">{{ $errors->first('stock') }}</span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{ $isCreate ? 'เพิ่ม' : 'เเก้ไข' }}สินค้า</button>
                    <a  href="{{ route('backoffice.index') }}" class="btn btn-primary">หน้าหลัก</a>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection


