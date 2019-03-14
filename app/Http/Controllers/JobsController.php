<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jobs = Job::all();

        /*
            TODO:
            - Display all jobs (each job will have a button to edit)
            - Button to add new job
         */
        return view('jobs.index', compact('jobs'));
    }

    /**
     * Navigate to the create view with job information.
     */
    public function create()
    {

    }

    /**
     * Create the job.
     */
    public function store()
    {

    }

    /**
     * Navigate to the edit view with job information.
     */
    public function edit()
    {

    }

    /**
     * Update the job with changes.
     */
    public function update()
    {

    }

    /**
     * Delete the job.
     */
    public function delete()
    {

    }
}
