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
                 <form class="card" method="{{$isCreate ? 'post' : 'post'}}" action="{{ $isCreate ? route('cash_registers.store') : route('cash_registers.update', $Cash_registers->id ?? 0) }}">
                @if (!$isCreate)
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}

                @endif
                @if ($isCreate)
                     @method($isCreate ? 'post' : 'put')
                    @csrf
                @endif
                <div class="card-header">
                    <h3 class="card-title">แก้ไขเงินทอน ประเภท({{$Cash_registers->money_type}})บาท</h3>
                </div>


                <div class="card-body">
                    <div class="form-group">
                        <label for="product_name">ประเภทเงิน</label>
                        <input readonly value="{{ $Cash_registers->money_type }}" name="money_type" id="money_type" value="{{ $Cash_registers->money_type ?? '' }}" class="form-control {{ $errors->has('$Cash_registers') ? 'is-invalid' : '' }}" ></input>
                        <span class="invalid-feedback">{{ $errors->first('money_type') }}</span>
                    </div>
                     <div class="form-group">
                        <label for="amount">จำนวน</label>
                        <input value="{{ $Cash_registers->amount }}" type="number" name="amount" id="amount" value="{{ $Cash_registers->amount ?? '' }}" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" ></input>
                        <span class="invalid-feedback">{{ $errors->first('amount') }}</span>
                    </div>
                     <div class="form-group">
                        <label for="pricesum">ยอดเงิน (บาท)</label>
                        <input readonly value="{{$Cash_registers->pricesum }}"  type="number" name="pricesum" id="pricesum" value="{{ $Cash_registers->pricesum ?? '' }}" class="form-control {{ $errors->has('pricesum') ? 'is-invalid' : '' }}" ></input>
                        <span class="invalid-feedback">{{ $errors->first('pricesum') }}</span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">{{ $isCreate ? 'เพิ่ม' : 'เเก้ไข' }}จำนวน</button>
                    <a  href="{{ route('backoffice.index') }}" class="btn btn-primary">หน้าหลัก</a>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
$(function(){
            $('#amount').keyup(function(){

               var value1 = parseFloat($('#amount').val()) || 0;
                var value2 = parseFloat($('#money_type').val()) || 0;
                  if (value1<0){
                   $(this).val(0);
                   value1=0;
               }
               $('#pricesum').val(parseInt(value1 * value2));

               console.log(value1 * value2);
            });
         });

</script>




@endsection


