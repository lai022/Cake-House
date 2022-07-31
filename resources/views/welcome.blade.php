@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
    
    <div class="content">
        <img src="/img/cake-house.png" alt="cake house logo">
        <div class="title m-b-md">
           Best Cake Ever!
        </div>
        <p class="mssg">{{ session('success') }}</p>
        <a href="{{ route('cakes.create') }}">Order a cake!</a>
    </div>
</div>
@endsection