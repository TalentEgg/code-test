<ul class="jobs-list">

    <br />
    <h4> JOBS ( {{ $jobs->count() }} ) </h4>
    <br />

    @foreach($jobs as $job)
        <li>

            <div>
                <div>
                    {{$job->description}}
                </div>

                <div>

                    <a href="{{ route('jobs.edit', compact('job')) }}">
                        <button>EDIT</button>
                    </a>

                    <form
                        action="{{ route('jobs.destroy', compact('job')) }}"
                        method="POST"
                    >
                        @method('DELETE')
                        @csrf
                        <button>REMOVE</button>
                    </form>
                </div>
            </div>

        </li>
    @endforeach
</ul>


