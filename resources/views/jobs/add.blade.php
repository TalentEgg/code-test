@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
				@if (\Session::has('success'))
					<div class="alert alert-success">
						<ul>
							<li>Added Successfully</li>
						</ul>
					</div>
				@endif
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
                <div class="card-header">
					<h1 style="width:80%; float:left;"><i class="fas fa-plus-square"></i> Add New Job</h1>
				</div>

                <div class="card-body">
					<form method="post" action="save">
						@csrf
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="jobTitle">
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" name="jobDescription" rows="10"></textarea>
						</div>
						<div class="form-group">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jobStatus" id="jobStatus1" value="1">
								<label class="form-check-label">Active</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jobStatus" id="jobStatus1" value="0" checked>
								<label class="form-check-label">Inactive</label>
							</div>
						</div>
						<input type="submit" class="btn btn-primary">
					</form>

                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
