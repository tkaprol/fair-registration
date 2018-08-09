@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Available Expos</h1>
		</div>
		<div id="messages" class="col-md-12">
		@if(Session::has('message'))
    <div class="alert alert-info">
        {{ Session::get('message') }}
    </div>
		@endif
		</div>
		<div class="col-md-8">
		<div id="map_canvas" style="width: 100%;height: 600px;">map div</div>
		</div>
		<div class="col-md-4">
			<div id="hub" class="panel panel-default">
				<div class="panel-heading">Book Your Place at Expo</div>

				<div class="panel-body">
					<form action="/halls" method="post" id="book-form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="id">
						<div class="form-group has-feedback">
	            <label class="control-label"><strong>Name</strong></label>
	            <div id="name"> </div>
            </div>
						<div class="form-group has-feedback">
	            <label class="control-label"><strong>Location</strong></label>
	            <div id="location"> </div>
            </div>
						<div class="form-group has-feedback">
	            <label class="control-label"><strong>Date</strong></label>
	            <div id="date"> </div>
            </div>
					  <button id="book" type="submit" class="btn btn-primary" disabled="disabled">Book your place</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
