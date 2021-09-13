<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Avatar;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $avatars=Avatar::all();
        return view('auth.register',compact('avatars'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'age'=> ['required'],
            'avatar_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'age' => $request->age,
            'password' => Hash::make($request->password),
            'avatar_id' => $request->avatar_id,
            'role_id'=>2
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function edit($id){
        $avatars=Avatar::all();
        $edit = User::find($id);
        return view('pages.editUser',compact('edit','avatars'));
    }

    public function update($id,Request $request){
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'age'=> ['required'],
            'avatar_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
            
        ]);
        $update = User::find($id);
        $update->firstName = $request->firstName;
        $update->lastName = $request->lastName;
        $update->email = $request->email;
        $update->age = $request->age;
        $update->avatar_id = $request->avatar_id;
        $update->role_id = 2;
        $update->password = Hash::make($request->password);
        $update->save();
        return redirect('/dashboard');
    }
}
