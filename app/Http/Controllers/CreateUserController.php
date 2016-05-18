<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Input;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\Request;

class CreateUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\requests\UserCreateRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        //$user = User::create(Input::only('name', 'email', 'password', 'role_id'));
        //this->validate($request, ['name' => 'required', 'password' => 'required']);
        //User::create($request->all());
        //User::create(Request::all());
        //$user->save();
        //Flash::success('User successfully created!');
        //User::create(Request::all());

        /*$this->validate($request, [
            'name' => 'required|min:3|max:30|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3|max:255'
        ]);*/

        $input = Input::all();
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
            'role_id' => $input['role_id']
        ]);
        flash()->success('User created');
        return redirect('admin/user')->with('flash_message', 'User Created');

    }
}
