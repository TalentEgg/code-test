<?php

namespace App\Http\Controllers;

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
        
        $jobs = Job::with('user')->get();


        //Creating a custom data array for Jobs with human timestamp because we can not use diffForHuman in Vue.js

        $jobArray=[];
        foreach($jobs as $job){
            $jobArray[]=array(
                'id'=>$job->id,
                'title'=>$job->title,
                'description'=>$job->description,
                'user'=> $job->user->name,
                'created_at_human'=>$job->created_at->diffForHumans()
            );
        }

        return $jobArray;


    }

    // Post a new Job
    public function add(Request $request){


        $job = new Job();

        $job->title= $request->jobTitle;
        $job->description= $request->jobDescription;
        $job->user_id= Auth::user()->id;

        $job->save();


        return "added!";

    }

    // Delete a job
    public function delete(Request $request){

        $job=Job::destroy($request->job_id);

        return "deleted!";
    }

    // Get a job to show on update Component
    public function get(Request $request){

        $job= Job::find($request->jobId);

        return $job;

    }

    // Update a job
    public function update(Request $request){

        $job = Job::find($request->jobId);

        $job->title= $request->jobTitle;
        $job->description = $request->jobDescription;

        $job->save();


        return "updated!";

    }


    // NOTE: Feel free to add more methods as needed
}
