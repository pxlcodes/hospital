@extends('layouts.admin')
@section('title','Edit Service')
@section('content')
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h2 class="h2">Edit Service</h2>
		<div class="btn-toolbar mb-2 mb-md-0">
			<div class="btn-group mr-2">
				<a href="{{ route('service.index')}}" class="btn btn-sm btn-outline-secondary">Back</a>
				<button type="button" class="btn btn-sm btn-outline-secondary">Reset</button>
			</div>
		</div>
	</div>
	@if($errors->all())
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Error!</strong> Please fill all the field.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<form action="{{route('service.update', ['service' => $service->id]) }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="inputTitle">Name</label>
				<input type="text" class="form-control {{ $errors->first('name')?'is-invalid':'' }}"
				       value="{{ old('title')??$service->name}}" name="name" id="inputTitle"
				       placeholder="Name">
				@if($errors->first('title'))
					<div class="invalid-feedback">
						{{$errors->first('title')}}
					</div>
				@endisset
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<label for="inputCaption">Description</label>
				<input type="text" class="form-control {{ $errors->first('description')?'is-invalid':'' }}"
				       value="{{ old('description')??$service->description}}" name="description" id="inputCaption"
				       placeholder="Caption">
				@if($errors->first('description'))
					<div class="invalid-feedback">
						{{$errors->first('description')}}
					</div>
				@endisset
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="custom-file">
					<input type="file" class="custom-file-input {{ $errors->first('photo')?'is-invalid':''}}"
					       name="photo"
					       id="validatedCustomFile">
					<label class="custom-file-label"
					       for="validatedCustomFile">Choose file...</label>
					@if($errors->first('photo'))
						<div class="invalid-feedback">{{$errors->first('photo')}}</div>
					@endisset
				</div>
			
			</div>
		</div>
		@csrf
		@method('PATCH')
		<div class="btn-toolbar mb-2 mb-md-0 ">
			<div class="btn-group mr-2 shadow">
				<button type="submit" class="btn btn-md btn-outline-secondary">Submit</button>
			</div>
		</div>
	</form>

@endsection
