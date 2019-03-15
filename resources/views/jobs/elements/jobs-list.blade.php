<ul class="jobs-list">

    <div class="wrapper">
        <header class="header"><h3>JOBS ( {{ $jobs->count() }} )</h3></header>

        @foreach($jobs as $job)
            <aside class="sidebar">
                <div>
                    <a href="{{ route('jobs.edit', compact('job')) }}">
                        <button>EDIT</button>
                    </a>
                </div>
                <div>
                    <form
                        action="{{ route('jobs.destroy', compact('job')) }}"
                        method="POST"
                    >
                        @method('DELETE')
                        @csrf
                        <button>REMOVE</button>
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
        <footer class="footer">My footer</footer>
    </div>




    {{--@foreach($jobs as $job)--}}
        {{--<li>--}}

            {{--<div>--}}
                {{--<div>--}}
                    {{--{{$job->description}}--}}
                {{--</div>--}}

                {{--<div>--}}

                    {{--<a href="{{ route('jobs.edit', compact('job')) }}">--}}
                        {{--<button>EDIT</button>--}}
                    {{--</a>--}}

                    {{--<form--}}
                        {{--action="{{ route('jobs.destroy', compact('job')) }}"--}}
                        {{--method="POST"--}}
                    {{-->--}}
                        {{--@method('DELETE')--}}
                        {{--@csrf--}}
                        {{--<button>REMOVE</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</li>--}}
    {{--@endforeach--}}
</ul>


