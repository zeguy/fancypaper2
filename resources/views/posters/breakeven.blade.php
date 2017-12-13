@extends('layouts.master')

@section('content')

<form method='POST' action='/posters/breakeven'>
	{{ csrf_field() }}
	<fieldset name="breakeven">

		<legend><b>Breakeven Calculator:</b></legend>

        <div class="form-group">
            <label for="cost">Print Cost:</label>
            <input type="number" "form-control" name="cost" id="cost" required="required" placeholder="required" min="0" step="0.01" value=''>
        </div>

		<label for="platform">Platform:</label>
			<select name="platform" "form-control"  id="platform">
				<option value="ebay">ebay</option>
				<option value="expresso">expresso</option>
				<option value="shopify">shopify</option>
			</select>

		<div class="checkbox">
            <label>
            <input type="checkbox" name="shipping" id="shipping">Free Shipping:
            </label>
        </div>

		<button type="submit" name="submit" value="Submit">Submit</button>

	</fieldset>
</form>

<h6>Results:</h6>
@if(count($errors) > 0)
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@else
	{{ $message }}
@endif


@endsection