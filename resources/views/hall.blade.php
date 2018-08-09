@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Hall Map</h1>
		</div>
		<div class="col-md-8">
      <div id="map_canvas" style="width: 100%;height: 600px;">map div</div>
		</div>
		<div class="col-md-4">
      <div id="hub" class="panel panel-default">
				<div class="panel-heading">Book Your Place at Expo</div>

				<div class="panel-body">
					<form action="" method="get" id="book-form">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="id" value="{{ $id }}">
						<input type="hidden" name="lat" id="lat" value="{{ $pos['lat'] }}">
						<input type="hidden" name="lon" id="lon" value="{{ $pos['lon'] }}">
						<div class="form-group has-feedback">
	            <label class="control-label"><strong>Status</strong></label>
	            <div id="status"> </div>
            </div>
						<div class="form-group has-feedback">
	            <label class="control-label"><strong>Hall Name</strong></label>
	            <div id="name"></div>
            </div>
						<div class="form-group has-feedback">
							<label class="control-label"><strong>Booked By</strong></label>
							<div id="bookedby"> </div>
						</div>
						<div class="form-group has-feedback">
							<label class="control-label"><strong>Contact Information</strong></label>
							<div id="contact"> </div>
						</div>
						<div class="form-group has-feedback">
							<label class="control-label"><strong>Documents</strong></label>
							<div id="documents"> </div>
						</div>
					  <button id="book" type="submit" class="btn btn-primary" disabled="disabled">Reserve</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
