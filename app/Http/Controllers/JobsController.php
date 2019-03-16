<?php

namespace App\Http\Controllers;

use View;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*
            TODO:
            - Display all jobs (each job will have a button to edit)
            - Button to add new job
         */
		$jobs = Job::where('created_by','=',Auth::user()->id)->orderBy('id','desc')->paginate(5);
		
		return View::make("jobs/view", compact('jobs'));
    }

    // NOTE: Feel free to add more methods as needed
	
	public function save(Request $request)
    {	
		$this->validate(request(),[
            'jobTitle' => 'required|max:255',
			'jobDescription' => 'required',
        ]); 
        /*
            TODO:
            - Save jobs
        */
		$job = new Job();
        $job->title= $request->jobTitle;
        $job->description= $request->jobDescription;
		$job->status= $request->jobStatus;
        $job->created_by= Auth::user()->id;
		$job->created_at= date('Y-m-d H:i:s');
        $job->save();
		
        return redirect()->back()->with('success', ['Job Added Succesfully']);   
    }
	
	public function edit($id)
    {
        $job = Job::with('user')->where('id','=',$id)->first();

		return View::make("jobs/edit", compact('job'));
    }
	
	public function update(Request $request)
    {	
		$this->validate(request(),[
            'jobTitle' => 'required|max:255',
			'jobDescription' => 'required',
        ]); 
        /*
            TODO:
            - Update jobs
        */
		
		$job = Job::find($request->jobId);
        $job->title= $request->jobTitle;
        $job->description = $request->jobDescription;
		$job->status= $request->jobStatus;
		$job->updated_at= date('Y-m-d H:i:s');
        $job->save();
		
        return redirect()->back()->with('success', ['Job Updated Succesfully']);   
    }
	
	public function delete($id)
    {
        $job=Job::destroy($id);

		return redirect()->back()->with('success', ['Job Deleted Succesfully']); 
    }
}
