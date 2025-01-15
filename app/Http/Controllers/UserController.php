<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); 

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // validates the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:1|max:255',
        ]);

        // hashes the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // creates a new user with the validated data
        User::create($validatedData);

        // redirects the user to the home page
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // shows user profile
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // returns a view to edit the user profile
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // validates the data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:1|max:255',
        ]);

        // updates the user profile with the validated data
        $user->update($validatedData);
        
        // redirects the user to the profile 
        return redirect()->route('users.show');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // deletes the users company
        $user->companies()->delete();
        
        // deletes the jobs created by this user
        $user->jobs()->delete();
        
        // deletes the users account
        $user->delete();

        // redirects the user to the home page
        return redirect()->route('home');
    }
}
