@extends('layouts.app')
@section('content')

@php
    $isCreate = Request::route()->getName() == 'cash_registers.create';
@endphp
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
             <table class="table table-bordered bg-white table-hover">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ประเภทเงิน</th>
                        <th>จำนวน</th>
                        <th>ยอดเงิน(บาท)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($Cash_registers  as $indexKey => $Cash_registers)
                    <tr>
                        <td>{{ $indexKey+1 }}</td>
                        <td>{{ $Cash_registers->money_type }}</td>
                        <td>{{ $Cash_registers->amount }}</td>
                        <td>{{ $Cash_registers->pricesum }}</td>

                        <td>

                        
                            <a  class="btn btn-warning" href="{{ route('cash_registers.edit', $Cash_registers->id) }}">แก้ไข</a>
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


