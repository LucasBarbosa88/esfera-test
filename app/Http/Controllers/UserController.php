<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Services\Models\User\RegisterUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        $title = 'Users';
        return view('users.index', compact('users', 'title'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $phone = preg_replace('/[^0-9]/', '', $request->phone);
        $request->merge([
            'phone' => $phone,
        ]);
        $data = RegisterUserRequest::validate($request);
        $service = new RegisterUserService($data);

        if( !$product = $service->run() ) {
            return redirect()->back()->with('danger', 'Not possible create this User! Try again.');
        } else {
            return redirect()->back()->with('success', 'User created with success!');
        }
        return redirect()->back()->with('danger', 'Not possible create this User! Try again.');
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'User deleted with success!');
        }
        return redirect()->back()->with('danger', 'User not found, try again!');
    }
}
