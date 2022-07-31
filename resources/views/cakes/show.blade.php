@extends('layouts.layout')

@section('content')
<div class="wrapper cake-details">
    <h1>Order for Mr / Mrs {{ $cakes->name }}</h1>
    <p class="id">ID - {{$cakes->id}}</p>
    <p class="type">Type - {{$cakes->type}}</p>
    <p class="quantity">Quantity - {{$cakes->quantity}}</p>
    <p class="toppings">Extra toppings:</p>
    @if(!empty($cakes->toppings))
    <ul>   
        @foreach($cakes->toppings as $toppings)
        <li>{{ $toppings }}</li>
        @endforeach       
    </ul>
    @else
    <h4>No extra toppings</h4>
    @endif

    <button onclick="document.location='{{ route('cakes.modify', $cakes->id) }}'">Change Order</button>

    <form action="{{ route('cakes.delete', $cakes->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete Order</button>
    </form>

</div>
<a href="/cakes" class="back"><- Back to all cakes</a>
@endsection