@extends('layouts.layout')

@section('content')
<div class="wrapper cake-details">
    <h1>Order Details for Mr / Mrs {{ $cakes->name }}</h1>
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

</div>

<div class="wrapper create-cake">
    <h1>Update Your Cake!</h1>
    @include('inc.messages')
    <form action="{{ route('cakes.change', $cakes->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" id="id" name="id" value="{{ $cakes->id }}">
        <label for="name">Your name</label>
        <input type="text" id="name" name="name" value="{{$cakes->name}}">
        <label for="type">Choose cake type:</label>
        <select name="type" id="type">
            @if($cakes->type == "vanilla")
            <option value="chocolate">Chocolate</option>
            <option value="vanilla" selected>Vanilla</option>           
            <option value="cheese">Cheese</option>
            @elseif($cakes->type == "cheese")
            <option value="chocolate">Chocolate</option>
            <option value="vanilla">Vanilla</option>   
            <option value="cheese" selected>Cheese</option>
            @else
            <option value="chocolate" selected>Chocolate</option>
            <option value="vanilla">Vanilla</option>   
            <option value="cheese" >Cheese</option>         
            @endif
            
        </select>

        <label for="quantity">Choose the quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" value="{{$cakes->quantity}}">

        <fieldset>
            <label>Extra toppings:</label>         
            <input type="checkbox" name="toppings[]" value="oreo" <?php  if(is_array($cakes->toppings) && in_array("oreo",$cakes->toppings)){ echo "checked = \"checked\""; }?>>Oreo<br>
            <input type="checkbox" name="toppings[]" value="cream" <?php if(is_array($cakes->toppings) && in_array("cream",$cakes->toppings)){ echo "checked = \"checked\""; }?>>Cream<br>
            <input type="checkbox" name="toppings[]" value="chocolate" <?php if(is_array($cakes->toppings) && in_array("chocolate",$cakes->toppings)){ echo "checked = \"checked\""; }?>>Chocolate<br>
            <input type="checkbox" name="toppings[]" value="almond" <?php if(is_array($cakes->toppings) && in_array("almond",$cakes->toppings)){ echo "checked = \"checked\""; }?>>Almond<br>
        </fieldset>

        <input type="submit" value="Update Cake">
        <button onclick="document.location='{{ route('cakes.show', $cakes->id) }}'">Cancel</button>

    </form>
</div>
@endsection