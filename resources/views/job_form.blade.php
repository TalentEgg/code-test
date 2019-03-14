@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>{{ $job->id ? __('lang.edit_job') : __('lang.add_job') }}</h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('job.store') }}/{{ $job->id ?? '' }}">
                        @csrf
                        
                        @if (Request()->page)
                        <input type="hidden" name="page" value="{{ Request()->page }}">
                        @endif
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('lang.title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $job->title) }}" required>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overview" class="col-md-4 col-form-label text-md-right">{{ __('lang.overview') }}</label>
                            <div class="col-md-6">
                                <textarea id="overview" type="" class="form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" required>{{ old('overview', $job->overview) }}</textarea>
                                @if ($errors->has('overview'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('overview') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duties" class="col-md-4 col-form-label text-md-right">{{ __('lang.duties') }}</label>
                            <div class="col-md-6">
                                <textarea id="duties" type="duties" class="form-control{{ $errors->has('duties') ? ' is-invalid' : '' }}" name="duties" required>{{ old('duties', $job->duties) }}</textarea>
                                @if ($errors->has('duties'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('duties') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qualifications" class="col-md-4 col-form-label text-md-right">{{ __('lang.qualifications') }}</label>
                            <div class="col-md-6">
                                <textarea id="qualifications" type="qualifications" class="form-control{{ $errors->has('qualifications') ? ' is-invalid' : '' }}" name="qualifications" required>{{ old('qualifications', $job->qualifications) }}</textarea>

                                @if ($errors->has('qualifications'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('qualifications') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reports_to" class="col-md-4 col-form-label text-md-right">{{ __('lang.reports_to') }}</label>
                            <div class="col-md-6">
                                <input id="reports_to" type="reports_to" class="form-control{{ $errors->has('reports_to') ? ' is-invalid' : '' }}" name="reports_to" value="{{ old('reports_to', $job->reports_to) }}" required>

                                @if ($errors->has('reports_to'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reports_to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="compensation" class="col-md-4 col-form-label text-md-right">{{ __('lang.compensation') }}</label>
                            <div class="col-md-3">
                                <input id="compensation" type="text" class="form-control{{ $errors->has('compensation') ? ' is-invalid' : '' }}" name="compensation" value="{{ old('compensation', $job->compensation) }}" required>

                                @if ($errors->has('compensation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('compensation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <select id="compensation_unit" class="form-control{{ $errors->has('compensation_unit') ? ' is-invalid' : '' }}" name="compensation_unit">
                                    <option value="per year" {{ (old('compensation_unit', $job->compensation_unit) == 'per year' ? "selected" : "") }}>per year</option>
                                    <option value="per hour" {{ (old('compensation_unit', $job->compensation_unit) == 'per hour' ? "selected" : "") }}>per hour</option>
                                </select>
                                @if ($errors->has('compensation_unit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('compensation_unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="employment_type" class="col-md-4 col-form-label text-md-right">{{ __('lang.employment_type') }}</label>
                            <div class="col-md-6">
                                <select id="employment_type" class="form-control{{ $errors->has('employment_type') ? ' is-invalid' : '' }}" name="employment_type">
                                    <option value="full time" {{ (old('employment_type', $job->employment_type) == 'full time' ? "selected" : "") }}>full time</option>
                                    <option value="part time" {{ (old('employment_type', $job->employment_type) == 'part time' ? "selected" : "") }}>part time</option>
                                    <option value="contract" {{ (old('employment_type', $job->employment_type) == 'contract' ? "selected" : "") }}>contract</option>
                                </select>
                                @if ($errors->has('employment_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('employment_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('lang.location') }}</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location', $job->location) }}" required>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ $job->id ?  __('lang.update') : __('lang.save') }}
                                </button>
                                <a class="btn btn-default" href="{{ route('jobs.index') }}" role="button">{{ __('lang.cancel') }}</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection