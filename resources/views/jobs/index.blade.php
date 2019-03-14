@extends('layouts.app')

@section('content')

    <div class="global-width">

        <div class="base-sidebar-layout__sidebar">
                <a href="{{ action('JobsController@create') }}" class="btn btn-xs btn-info pull-right">
                    POST a JOB
                </a>
        </div>

        <div class="base-sidebar-layout__content">
            <div id="active-tab">
                @if($jobs->count() === 0)
                    @include('jobs.create')
                @else
                    @include('jobs.elements.jobs-list', ['jobs' => $jobs])
                @endif
            </div>
        </div>

    </div>
@endsection
