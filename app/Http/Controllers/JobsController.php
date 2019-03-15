<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Http\Request;

/**
 * Class JobsController
 * @package App\Http\Controllers
 */
class JobsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $jobs = $user->jobs()->paginate(8);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Navigate to the create view with job information.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Create the job.
     *
     * @param StoreJobRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreJobRequest $request)
    {
        $user = $request->user();

        $data = $request->all();
        $data['user_id'] = $user->id;

        $job = new Job($data);
        $saved = $job->save();

        if (!$saved) {
            return back()->withError('Could not create the job posting.')->withInput();
        }
        return redirect()->action('JobsController@index');
    }

    /**
     * Navigate to the edit view with job information.
     *
     * @param Job $job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the job with changes.
     *
     * @param UpdateJobRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateJobRequest $request, $jobId)
    {
        $job = Job::take(1)
            ->wherePublicId($jobId)
            ->first();

        if ($job == null) {
            return back()->withError('Job not found!')->withInput();
        }

        $user = request()->user();
        if (!$job->hasUser($user)) {
            return back()->withError('Cannot update job that does not belong to you')->withInput();
        }

        $data = $request->all();
        $saved = $job->update($data);

        if (!$saved) {
            return back()->withError('Save was not successful')->withInput();
        }

        return redirect()->action('JobsController@index');
    }

    /**
     * Delete the job.
     *
     * @param Job $job
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Job $job)
    {
        $user = auth()->user();

        if (!$job->hasUser($user)) {
            return back()->withError('Could not remove the job posting.')->withInput();
        }

        $deleted = $job->delete();

        return redirect()->action('JobsController@index', compact($deleted));
    }
}
