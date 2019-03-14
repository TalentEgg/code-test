<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get pagination number
        $items_per_page =env('JOBS_PER_PAGE', 10); 

        return view('jobs', [
            'jobs' => Job::paginate($items_per_page)
        ]);
    }

    /**
     * displays job form for a new entry
     */
    public function add()
    {
        return view('job_form', ['job' => new Job()]);
    }

    /**
     * gets job data and displays job form
     */
    public function edit($id)
    {
        $job = Job::find($id);
        if(!$job)
        {
            return redirect()->route('jobs.index')->with(['status' => "Can't edit. Job with ID {$id} not found.", 'error' => true]);   
        }
        
        return view('job_form', ['job' => $job]);
    }

    /**
     * creates or updates a job
     */
    public function store(Request $request, $id = 0)
    {
        $validatedData = $request->validate([
            'title'          => 'required|max:100',
            'overview'       => 'required|max:255',
            'duties'         => 'required|max:1000',
            'qualifications' => 'required|max:1000',
            'reports_to'     => 'required|max:100',
            'location'       => 'required|max:255',
            'compensation'   => 'required|digits_between:1,1000000',
            'employment_type'=> 'required',
        ]);

        $job = Job::findOrNew($id);
        $job->fill($request->all());
        $job->save();

        $page = [];
        if ($request->has('page')) 
        {
            $page = ['page' => $request->page];
        }

        return redirect()->route('jobs.index', $page)->with(['status' =>'Job saved']);
    }

    /**
     * removes a job
     */
    public function delete($id)
    {
        $job = Job::find($id);
        if($job)
        {
            $job->delete();
            return redirect()->route('jobs.index')->with(['status' => 'Job deleted']);
        }

        return redirect()->route('jobs.index')->with(['status' => "Can't delete. Job with ID {$id} not found.", 'error' => true]);        
    }
}
