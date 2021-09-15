<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AllUserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('pages.readAllUsers',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=User::find($id);
        $roles=Role::all();
        $avatars=Avatar::all();
        return view('pages.editAllUser',compact('edit','roles','avatars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $update->role_id = $request->role_id;
        $update->password = Hash::make($request->password);
        $update->save();
        return redirect('/dashboard')->with('success','Utilisateur modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=User::find($id);
        $destroy->delete();
        return redirect()->back()->with('success','Utilisateur supprimé avec succès');
    }
}
