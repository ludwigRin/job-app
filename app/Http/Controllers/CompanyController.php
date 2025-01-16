<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        // validates the data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // creates a new company with the validated data
        $company = Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => auth()->id(), 
        ]);

        // returns user back to company list
        return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        // displays the details of a specific company
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        // returns a view to edit a company
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        // validates the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        // updates the selected company with the validated data
        $company->update($validatedData);
        
        // redirects the user to the company list
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        // deletes the company
        $company->delete();

        // redirects the user to company list
        return redirect()->route('companies.index');
    }
}
