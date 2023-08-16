<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {
        $users = User::latest()->paginate(5);

        return view('users.index', compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user,StoreUserRequest $request) 
    {
        $user::create(array_merge($request->only('name', 'email', 'password','role'),[
            'user_id' => auth()->id()
        ]));

        return redirect()->route('user.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id) 
    {
        $user = User::findOrFail($id);
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(string $id, UpdateUserRequest $request) 
    {
        $user = User::findOrFail($id);
        $user::update(array_merge($request->only('name', 'email', 'password','role'),[
            'user_id' => auth()->id()
        ]));

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}