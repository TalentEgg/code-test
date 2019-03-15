<ul class="jobs-list">

    <div class="wrapper">
        <header class="header">
            <div class="header__left">
                <a href="{{ action('JobsController@create') }}" class="btn btn-xs btn-info pull-right">
                    POST a JOB
                </a>

            </div>
            <div class="header__left">
                <h3>JOBS ( {{ $jobs->count() }} )</h3>
            </div>
        </header>

        @foreach($jobs as $job)
            <aside class="sidebar">
                <div class="sidebar__edit">
                    <a href="{{ route('jobs.edit', compact('job')) }}" class="btn btn-xs btn-info pull-right">
                        EDIT
                    </a>
                </div>
                <br/>
                <div class="sidebar__delete">
                    <form
                        action="{{ route('jobs.destroy', compact('job')) }}"
                        method="POST"
                    >
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-xs btn-info pull-right">REMOVE</button>
                    </form>
                </div>
            </aside>

            <article class="content">
                <h3> {{ $job->company_name }} </h3>
                <h5> -- {{ $job->job_title }} -- </h5>
                <p>
                    {{ $job->description }}
                </p>
            </article>

        @endforeach
        <footer class="footer">
            {{ $jobs->links() }}
        </footer>
    </div>
</ul>


