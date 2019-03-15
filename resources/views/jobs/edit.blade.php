@extends('layouts.app')

@section('content')

    <section class="container">

        <h2>EDIT JOB</h2>
        <br />

        <form class="form"
              method="POST"
              action="{{ route('jobs.update', ['job' => $job->public_id]) }}"
        >
            @method('PUT')
            @csrf

            @if (session('error'))
                <div class="grid-row">
                    <div class="grid-row__col grid-row__col--sm-6">
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    </div>
                </div>
            @endif

            <div class="grid-row">
                <div class="grid-row__col grid-row__col--sm-6">
                    <label for="company_name" class="form__label">Company Name (Required):</label>

                    <input
                        type="text"
                        name="company_name"
                        id="company_name"
                        class="form__input"
                        placeholder='Amazon'
                        value={{ isset($job) ? $job->company_name : "" }}
                    />
                    @if ($errors->has('company_name'))
                        <div class="alert alert-danger">{{ $errors->first('company_name') }}</div>
                    @endif
                </div>
            </div>

            <div class="grid-row">
                <div class="grid-row__col grid-row__col--sm-6">
                    <label for="job_title" class="form__label">Job Title (Required):</label>
                    <input
                        type="text"
                        name="job_title"
                        id="job_title"
                        class="form__input"
                        placeholder="Developer"
                        value={{ isset($job) ? $job->job_title : '' }}
                    />
                    @if ($errors->has('job_title'))
                        <div class="alert alert-danger">{{ $errors->first('job_title') }}</div>
                    @endif
                </div>
            </div>

            <div class="grid-row">
                <div class="grid-row__col grid-row__col--sm-6">
                    <label for="address" class="form__label">Address (Optional):</label>
                    <input
                        type="text"
                        name="address"
                        id="address"
                        class="form__input"
                        placeholder="123 Fake Street"
                        value={{ isset($job) ? $job->address : '' }}
                    />
                </div>
            </div>

            <div class="grid-row">
                <div class="grid-row__col grid-row__col--sm-6">
                    <label for="description" class="form__label">Job Description (Optional):</label>
                    <textarea
                        cols="80"
                        rows="8"
                        name="description"
                        id="description"
                        class="form__text"
                    >{{ isset($job) ? $job->description : '' }}
                    </textarea>
                </div>
            </div>

            <div>
                <input type="submit" value="Save" />
                <a href="{{ URL::previous() }}" class="btn btn-default">CANCEL</a>
                <div class="clr"></div>
            </div>
        </form>
    </section>

@endsection
