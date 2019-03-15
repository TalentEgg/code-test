@extends('layouts.app')

@section('content')

    <div class="global-width">
        <div class="base-sidebar-layout__content">
            <div>
                @include('jobs.elements.jobs-list', ['jobs' => $jobs])
            </div>
        </div>

    </div>
@endsection
