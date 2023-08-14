<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Faker\Factory as faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AdminRegisteration;

class UsersController extends Controller
{
    //

    public function adregister(Request $request)
{
    try {
        $user = new User();
        $faker = Faker::create();

        $user->name = $request->input('username');
        $user->email = $faker->unique()->safeEmail;
        $user->password = Hash::make($request->input('password'));
        $user->role = 'admin';
        $user->save();

        return redirect()->back()->with('success', 'User Added');
    } catch (Exception $e) {
        return redirect()->back()->with('danger', 'Unable to process request: ' . $e->getMessage());
    }
}

public function Login(Request $request)
{
    try {
        $username = $request->input('username');
        $password = $request->input('password');
        
        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            return redirect()->route('adminHomePage');
        } else {
            return redirect()->back()->with('danger', 'Incorrect username or password');
        }

    } catch (Exception $e) {
        // Handle exceptions here, log errors, or display an appropriate error message.
        return redirect()->back()->with('danger', 'Unable to process request: ' . $e->getMessage());
    }
}

public function logout()
{

  Session::flush();
  Auth::logout();

  return redirect()->route('loginpage');
}

}


    