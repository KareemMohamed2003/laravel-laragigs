<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/create form 
    public  function create()
    {
        return  view("users.register");
    }
    // store new user
    public  function store(Request $request)
    {
        // return  view("users.register");
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
            // now the confirmed will make sure that the password field matches another password field with the name password_confirmation
            // we need to stick the name naming convention password_confirmation to our name field in the password input field .

        ]);
        // hash password  
        // we hash our passwor in the table 
        $formFields['password'] = bcrypt($formFields['password']);
        // create a user
        $user = User::create($formFields);
        // login 
        auth()->login($user);
        return redirect("/")->with('message', 'user created and logged in');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        // this will remove the authenticaiton from the user session 
        // now laravel recommends that we invalidate the user session and regenerate their crsf token .  
        // like so :
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/')->with("message", "you logged out !");
    }

    // show login form 
    public function login()
    {
        return view("users.login");
    }
    // authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([

            'email' => ['required', 'email'],
            'password' => 'required'

        ]);

        if (auth()->attempt($formFields)) {
            // we wanna generate a session id 
            $request->session()->regenerate();

            return redirect("/");
        } else {
            return back()->withErrors(['email' => 'invalid credentials'])->onlyInput("email");
            // so if something goes wrong with the login we wanna show an error message in the email field "invalid credentials "  
        }
    }
}
