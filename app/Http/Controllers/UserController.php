<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private Users $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function list()
    {
        $users = $this->users->all();

        return view('list', ['users' => $users]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'hobbies' => 'required',
        ]);

        $this->users->create([
            'name' => $request->name,
            'dob' => $request->dob,
            'hobbies' => $request->hobbies
        ]);

        return redirect()->route('/')->with('success', 'User created successfully');
    }

    public function edit(int $int)
    {
        return view('edit');
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required',
            'dob' => 'required',
            'hobbies' => 'required',
        ]);

        $users = $this->users->find($id);

        if (empty($users)) {
            return redirect('/')->with('error', 'User not found');
        }

        $users->name = $request->get('name'); 
        $users->dob = $request->get('dob');
        $users->hobbies = $request->get('hobbies');
        $users->save();

        return redirect('/')->with('success', 'User updated successfully');;        
    }

    public function delete(int $id)
    {
        $users = $this->users->find($id);

        if (empty($users)) {
            return redirect('/')->with('error', 'User not found');
        }

        $users->delete();

        return redirect('/')->with('success', 'User deleted successfully');;
    }
}
