@extends('layouts.layout')

@section('content')
<div class="wrapper create-cake">
    <h1>Create a New Cake!</h1>
    @include('inc.messages')
    <form action="/cakes" method="POST">
        @csrf
        <label for="name">Your name</label>
        <input type="text" id="name" name="name" value="{{ old('name')}}">
        <label for="type">Choose cake type:</label>
        <select name="type" id="type">
            <option value="chocolate" {{ old('type') == "chocolate" ? 'selected' : '' }}>Chocolate</option>
            <option value="vanilla" {{ old('type') == "vanilla" ? 'selected' : '' }}>Vanilla</option>
            <option value="cheese" {{ old('type') == "cheese" ? 'selected' : '' }}>Cheese</option>
        </select>

        <label for="quantity">Choose the quantity:</label>
        <input type="number" name="quantity" id="quantity" min="1" value="{{ old('quantity') }}">

        <fieldset>
            <label>Extra toppings:</label>
            <input type="checkbox" name="toppings[]" value="oreo" {{ (is_array(old('toppings')) && in_array("oreo", old('toppings'))) ? 'checked' : '' }}>Oreo<br>
            <input type="checkbox" name="toppings[]" value="cream" {{ (is_array(old('toppings')) && in_array("cream", old('toppings'))) ? 'checked' : '' }}>Cream<br>
            <input type="checkbox" name="toppings[]" value="chocolate" {{ (is_array(old('toppings')) && in_array("chocolate", old('toppings'))) ? 'checked' : '' }}>Chocolate<br>
            <input type="checkbox" name="toppings[]" value="almond" {{ (is_array(old('toppings')) && in_array("almond", old('toppings'))) ? 'checked' : '' }}>Almond<br>
        </fieldset>

        <input type="submit" value="Order Cake">
        <input type="reset" value="Reset">
        <a href="/cakes" class="back">Cancel</a>

    </form>
</div>
@endsection