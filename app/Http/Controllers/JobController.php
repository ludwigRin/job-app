<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        // validates the data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'working_hours' => 'required|integer|min:1',
            'description' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:category,id',
        ]);

        // creates a new job with the validated data
        Job::create($validatedData);

        // returns user back to job list
        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        // displays the details of a specific job
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // returns a view to edit a job
        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        // validates the data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'working_hours' => 'required|integer|min:1',
            'description' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:category,id',
        ]);

        // updates the selected job with the validated data
        $job->update($validatedData);
        
        // redirects the user to the job list
        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        // deletes the passed job
        $job->delete();

        // redirects the user to job list
        return redirect()->route('jobs.index');
    }
}
