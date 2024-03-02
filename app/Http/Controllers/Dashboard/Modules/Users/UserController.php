<?php

namespace App\Http\Controllers\Dashboard\Modules\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\UserStoreRequest;
use App\Http\Requests\Dashboard\Users\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Symfony\Component\String\u;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('id','!=',auth()->user()->id)->paginate(10);
        return view('dashboard.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = User::TYPES;
        return view('dashboard.users.create' ,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $attributes = $request->validated();
        $attributes['password'] = Hash::make($attributes['password']);
        User::create($attributes);
        return redirect()->back()->with('success', __('created_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = User::TYPES;
        return view('dashboard.users.edit' ,compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $attributes = $request->validated();
        $user->update($attributes);
        return redirect()->back()->with('success', __('updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', __('deleted_successfully'));
    }
}
