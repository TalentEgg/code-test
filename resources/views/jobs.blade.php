@extends('layouts.app')


@section('content')

<div class="container">
    @if (session('status'))
        <div class="alert {{ session('error') ? 'alert-danger' : 'alert-success' }}  alert-dismissible" role="alert">
            {{ session('status') }} 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                        <div class="col-md-8"><h3>{{ __('lang.current_jobs') }}</h3></div>
                        <div class="col-md-4 text-right">
                            <a href="{{ route('job.add') }}" class="btn btn-primary active" role="button" aria-pressed="true">Add Job</a>
                        </div>
                        </div>
                    </div>
                        <div class="card-body">
                        @if (count($jobs) > 0)
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">{{ __('lang.id') }}</th>
                                <th scope="col">{{ __('lang.title') }}</th>
                                <th scope="col">{{ __('lang.overview') }}</th>
                                <th scope="col">{{ __('lang.duties') }}</th>
                                <th scope="col">{{ __('lang.qualifications') }}</th>
                                <th scope="col">{{ __('lang.reports_to') }}</th>
                                <th scope="col">{{ __('lang.compensation') }}</th>
                                <th scope="col">{{ __('lang.employment_type') }}</th>
                                <th scope="col">{{ __('lang.location') }}</th>
                                <th class="text-secondary" colspan="2" scope="col">{{ __('lang.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->title }}</td>
                                    <td>{{ $job->overview }}</td>
                                    <td>{{ $job->duties }}</td>
                                    <td>{{ $job->qualifications }}</td>
                                    <td>{{ $job->reports_to }}</td>
                                    <td>${{ number_format($job->compensation, 2) }} {{ $job->compensation_unit }}</td>
                                    <td>{{ $job->employment_type }}</td>
                                    <td>{{ $job->location }}</td>
                                    <td><a href="{{ route('job.edit', ['id' => $job->id, 'page' => Request()->page]) }}">Edit</a></td>
                                    <td><a href="#" class="ml-2 text-danger pointer" role="button" data-toggle="modal" data-target="#confirm-delete" data-href="{{ route('job.delete', ['id' => $job->id]) }}">Delete</a></td>
                            @endforeach
                            </tbody>
                            </table>
                            {{ $jobs->links() }}
                        @else
                        <div class="alert alert-primary" role="alert">
                            {{ __('lang.no_jobs') }}
                        </div>
                        @endif    
                        </div>    
                    </div>
                </div>
            </div>
        </div>                
    </div>
</div>

<!-- Modal Dialog -->
<div class="modal" tabindex="-1" role="dialog" id="confirm-delete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('lang.confirm_delete') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>{{ __('lang.delete_job') }}</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('lang.cancel') }}</button>
        <a class="btn btn-danger btn-ok">{{ __('lang.delete') }}</a>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function()
    {
        $('#confirm-delete').on('shown.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

@endsection