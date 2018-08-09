@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Reservation Form</h1>
		</div>
		<div id="messages" class="col-md-12">
		@foreach ($errors->all() as $error)

  	<div class="alert alert-danger"><strong>Error!</strong> {{ $error }}</div>

		@endforeach
		</div>
		<div id="hub" class="col-md-12">
					<form action="/halls/book" method="post" id="book-form" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" id="id" value="{{ $id }}">
						<div class="panel panel-default">
									<div class="panel-heading">Expo and Hall Details</div>
									<div class="panel-body">
										<div class="form-group has-feedback">
					            <label class="control-label"><strong>Expo Name</strong></label>
					            <div><button type="button" id="changeExpo" class="btn btn-warning pull-right">[Change Expo]</button> <span id="expo">{{ $expoName }}</span> </div>
				            </div>
										<div class="form-group has-feedback">
					            <label class="control-label"><strong>Hall Name</strong></label>
					            <div><button type="button" id="changeHall" class="btn btn-warning pull-right">[Change Hall]</button><span id="hall">{{ $hallName }}</span> </div>
				            </div>
						</div>
					</div>
						<div class="panel panel-default">
									<div class="panel-heading">Contact Details</div>

									<div class="panel-body">
										<div class="form-group has-feedback">
					            <label class="control-label"><strong>Name</strong></label>
					            <input type="text" class="form-control" name="name" id="name" value="{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}" />
				            </div>
										<div class="form-group has-feedback">
					            <label class="control-label"><strong>E-mail</strong></label>
					            <input type="text" class="form-control" name="mail" id="mail" value="{{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}}" />
				            </div>
						</div>
					</div>
						<div class="panel panel-default">
									<div class="panel-heading">Event Details</div>

									<div class="panel-body">
										<div class="form-group has-feedback">
					            <label class="control-label"><strong>Marketing Documents</strong></label>
					            <input type="file" class="form-control-file" id="documents" name="documents">
				            </div>
										<div class="form-group has-feedback">
											<label class="control-label"><strong>Company Logo</strong></label>
					            <input type="file" class="form-control-file" id="logo" name="logo">
				            </div>
							  		<button id="book" type="submit" class="btn btn-primary">Confirm Reservation</button>
						</div>
					</div>
				</form>
		</div>
	</div>
</div>

@endsection
