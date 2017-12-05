@extends('layouts.master')

@section('content')

<form method='POST' action='/posters'>
	{{ csrf_field() }}
	<fieldset name="breakeven">

		<legend><b>Breakeven Calculator:</b></legend>

		<label for="cost">Print Cost:</label>
		<input type="number" name="cost" id="cost" required="required" placeholder="required" min="0" step="0.01" value=''>

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