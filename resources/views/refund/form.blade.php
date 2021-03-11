@extends('layouts.app')
@section('content')


<div class="container">
  5555555

    @forelse ($Cash_registers  as $indexKey => $Cash_registers)
                       {{ $Cash_registers->money_type }}
                       {{ $Cash_registers->amount }}


                    @empty
                    @endforelse

</div>
    @endsection


