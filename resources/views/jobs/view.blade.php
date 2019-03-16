@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
				@if (\Session::has('success'))
					<div class="alert alert-success">
						<ul>
							<li>Job Deleted Successfully</li>
						</ul>
					</div>
				@endif
                <div class="card-header">
					<h1 style="width:80%; float:left;"><i class="fas fa-clone"></i> Jobs</h1>
					<h1>
						<a href="jobs/add">
							<i style="float:right" class="fas fa-plus-square"></i>
						</a>
					</h1>
				</div>

                <div class="card-body">
					<table class="table table-striped">
						<thead class="thead-dark">
							<tr>
								<th scope="col">Title</th>
								<th scope="col">Status</th>
								<th scope="col" colspan="2">Action</th>
							</tr>
					    </thead>
						<tbody>
						@foreach ($jobs AS $job)
							<tr>
								<th scope="row">{{$job['title']}}</th>
								<td>
									@if($job['status'])
										<i style="color:green" class="fas fa-toggle-on"></i>
									@else
										<i style="color:red" class="fas fa-toggle-off"></i>
									@endif
								</td>
								<td>
									<a href="jobs/edit/{{$job['id']}}">
										<i class="fas fa-edit"></i>
									</a>
								</td>
								<td>
									<a href="javascript:void(0)" onClick="confirmDelete({{$job['id']}})">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
                    {{ $jobs->links() }}

                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
<script>
function confirmDelete(id) {
	var d = confirm("Are you sure you want to delete this job posting?");
	
	if (d == true) {
		window.location.replace("http://localhost/talentEgg/public/jobs/delete/"+id);
	}

}
</script>