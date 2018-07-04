  @if(session()->has('successMsg') && is_array(session('successMsg')) )
	<div class="alert alert-success">
 		<a href="#" class="my-alert-dismissible close " data-dismiss="alert" aria-label="close">&times;</a>
 		@foreach (session('successMsg') as $msg)
 			<li><strong><i class="fa fa-check" aria-hidden="true"></i> </strong> {{ $msg }}</li>
 		@endforeach
 		
      
    </div>
   @elseif (session()->has('successMsg'))
   	<div class="alert alert-success">
 		<a href="#" class="my-alert-dismissible close " data-dismiss="alert" aria-label="close">&times;</a>
 		<strong><i class="fa fa-check" aria-hidden="true"></i> </strong> {{session()->get('successMsg')}}
      
    </div>
   @endif
					

					