@extends('layouts.app')

@section('content')

    <div class="global-width">

        <div class="base-sidebar-layout__sidebar">
            @if($jobs->count() !== 0)
                <a
                    href="{{ action('JobsController@create') }}"
                >
                    POST a JOB
                </a>
            @endif
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
