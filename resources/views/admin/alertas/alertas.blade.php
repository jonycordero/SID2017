@if(Session::has('message-susses'))
	
	<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  		{{Session::get('message-susses')}}
	</div>
@endif

@if(Session::has('message-error'))
	<div class="alert alert-danger alert-dismissable">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
  		{{Session::get('message-error')}}
	</div>
@endif

@if(count($errors)>0)
	<div class="alert alert-danger alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		@foreach($errors->all() as $error)
  			<li>{!!$error!!}</li>
  		@endforeach
	</div>
@endif