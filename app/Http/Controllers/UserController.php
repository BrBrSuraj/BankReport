<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;


use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('is_admin');
        $members=User::where('role_id', '<>', 1)->orderBy('role_id')->get();
        //$members=User::where('role_id',3)->get();

        return view('userindex', compact('members'));
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('is_admin');
        $roles=Role::where('id', '<>', 1)->get();
        return view('usercreate', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->authorize('is_admin');
        User::create($request->validated()+['password'=>bcrypt('password')]);

        return redirect()->route('user.create')->with('success', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('is_admin');
        $roles=Role::where('id', '<>', 1)->where('id', '<>', 2)->get();
         $role_name= Role::where('id',$user->role_id)->select('role')->first();
        return view('useredit', compact('user', 'roles', 'role_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Requests\UpdateUserRequest $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $this->authorize('is_admin');
        $user->update($request->validated());
        return redirect()->route('user.edit', $user)->with('success', 'Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('is_admin');
        $user->delete();
        return redirect()->route('user.index');
    }


}