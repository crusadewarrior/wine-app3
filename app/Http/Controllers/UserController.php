<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\RoleRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laracasts\Flash\Flash;
use App\Http\Requests\UpdateUserRequest;
use Auth;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['showProfile']]);
    }

    public function createShow()
    {
        //$users = User::all();

        $users = User::latest('created_at')->get();

        return view('admin.users', compact('users'));

    }

    /**
     * Show the user profile
     *
     * @param $id
     * @return mixed
     */

    public function showProfile($id)
    {
        try {
            $user = User::findorfail($id);

            return view('admin.profile', compact('user'));
        } catch (ModelNotFoundException $e) {
            //session()->flash('error_message', 'User does not exist');
            //flash('User does not exists')->warning();
            //Flash::error('Sorry! Please try again.');
            flash()->error('User does not exist');

            //return redirect()->back()->with('error_message', 'User does not exist');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.createform');
    }

    public function store(Request $request)
    {
        //$user = User::create(Input::only('name', 'email', 'password', 'role_id'));
        $user = User::create($request->all());
        $user->save();
        Flash::success('User successfully created!');

        return redirect('admin/user')->with('flash_message', 'User Created');

    }

    /**
     * Show the form for editing the user
     *
     * @param $id
     * @return mixed
     */

    public function editProfile($id)
    {
        try {
            $user = User::findorfail($id);

            return view('admin.edit', compact('user'));

        } catch (ModelNotFoundException $e) {;
            flash()->error('User does not exist');

            return redirect()->back();
        }
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findorfail($id);
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->save();
        //$input = Input::all();

       /* $user = Auth::user();

        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->password = $input['password'];
        $user->role_id = $input['role_id'];
        $user->update();*/
        flash()->success('User updated');

        return redirect('admin/user');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Models\user $user
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        //Flash::success('User deleted!');
        flash()->success('User deleted!');

        return redirect('admin/user');
    }
}
