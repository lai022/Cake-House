@extends('layouts.app')

@section('content')
<div class="wrapper cake-index">
    <h1>Cake Orders</h1>
    @if(count($cakes)>0)
        @foreach($cakes as $cake)
            <div class="cake-item">
                <img src="/img/cake.png" alt="cake icon">
                <h4><a href="/cakes/{{$cake->id}}">Order Id: {{ $cake->id }} | Created at {{ $cake->created_at }}</a></h4>
            </div>
        @endforeach
        {{$cakes->links()}}
    @else
    <div class="cake-item" style="text-align:center">
        <h4>No orders found!!!</h4>
    </div>  
    @endif
    
    
</div>
@endsection