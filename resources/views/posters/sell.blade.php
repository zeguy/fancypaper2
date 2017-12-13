@extends('layouts.master')

@section('content')

<form method='POST' action='/posters/{{ $poster->id }}'>
    {{ csrf_field() }}
    <fieldset name="Sale Info:">

        <legend><b>Sale Info:</b></legend>

        <label for="price">Sale Price:</label>
        <input type="number" name="price" id="price" required="required" placeholder="required" min="0" step="0.01" value=''>

        <label for="platform">Platform:</label>
            <select name="platform" id="platform">
                <option value="ebay">ebay</option>
                <option value="expresso">expresso</option>
                <option value="shopify">shopify</option>
            </select>

        <label for="shipping">Free Shipping:</label>
        <input type="checkbox" name="shipping" id="shipping">

        <button type="submit" name="submit" value="Submit">Submit</button>

    </fieldset>
</form>

@endsection