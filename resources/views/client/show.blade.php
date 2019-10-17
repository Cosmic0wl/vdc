@extends('layouts.default')
 
@section('content')
<h3 class="text-secondary text-center pb-3">User</h3>
<div class="d-flex justify-content-around">
	<a href="{{ url('account/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info text-white">Edit Account</button>
	</a>
	
	<a href="{{ url('client/'.$resUser->id.'/edit')}}" >
		<button class="btn btn-info text-white">Edit Profile</button>
	</a>
	<a href="{{ url('documents/'.$resUser->id)}}" >
		<button class="btn btn-info text-white">Documents</button>
	</a>
	<a href="{{ url('reservations/')}}" >
		<button class="btn btn-info text-white">My Courses</button>
	</a>
</div>
	<hr>
<div class="row d-flex justify-content-center my-4 ">	
	<div class="col-6 shadow p-3 m-2">	
		<h2 class="text-primary text-center">{{ $resUser->name}} {{ $resUser->last_name}}</h2>
		<div class="row d-flex justify-content-center">
			<div class="col-lg-6 ">
				<img src="{{ $resUser->image}}" alt="" class="img-fluid">
			</div>
			<div class="col-lg-12">
				@foreach ($res as $res)
					<h5 class="p-2">About Me</h5>
				<p class="pb-3"> {{ $res->description }}</p>
				<hr>
				<p>Date of Birth: {{ date('d-m-Y', strtotime($res->date_birth)) }}</p>
				<p>Website: {{ $res->website }}</p>
			@endforeach
			</div>
		</div>
</div>
</div>
<!-- Comment Section -->
@if(Auth::user()->id != $resUser->id)
	@if(Auth::user()->role == 'sys_admin' OR Auth::user()->role == 'off_admin' OR Auth::user()->role == 'trainer' OR Auth::user()->role == 'course_provider' OR Auth::user()->role == 'consultant')

	<div class="row d-flex justify-content-center flex-column align-items-center">
		<div class="col-6 mb-3">
			<form method="POST" action="{{ route('comments.store') }}">
			@csrf
				<h3 class="text-blue">Write a Note</h3>
				<input type="hidden" name="FK_author" value="{{ Auth::user()->id}}" >
				<input type="hidden" name="FK_subject" value="{{ $resUser->id }}" >
				<textarea name="content" class="w-100"></textarea >
				<div class="text-right">
					<button type="submit" class="btn btn-primary text-right">Send</button>
				</div>
			</form>
		</div>
		<div class="col-6">
		@foreach ($resUser->comment()->orderBy('created_at', 'desc')->get() as $comment)
			<div class="alert alert-primary d-flex flex-column" role="alert">
				@if(Auth::user()->id == $comment->FK_author OR Auth::user()->role == 'sys_admin')
				<form method="POST" action="{{ route('comments.destroy', $comment->id) }}">
		            {{ method_field('DELETE') }}
		            @csrf
	                <div class="text-right">
	                	<button type="submit" class="btn btn-sm btn-link text-decoration-none text-danger" onclick="return confirm('Are you sure to delete?')">x</button>
	                </div>
				</form>
				@endif
			  {{ $comment->content }}
			@foreach($comment->author()->get() as $author)
			  <small class="text-right"><span class="text-left small">{{ $comment->created_at }}</span> {{ $author->name }}</small>
			@endforeach
			</div>
		@endforeach
		</div>
	</div>
	@endif
@endif

@endsection