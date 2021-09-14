<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
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
        $avatars = Avatar::all();
        return view('pages.readAvatars', compact('avatars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $avatars = Avatar::all();
        if (count($avatars)< 5) {
            return view('pages.createAvatars');
        }else{
            return redirect()->back()->with('warning','Limite maximale de 5 avatars atteinte');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'src'=>'required|image',
        ]);

        $store= new Avatar;
        $store->name= $request->name;
        $request->file('src')->storePublicly('img/','public');
        $store->src = $request->file('src')->hashName();
        $store->save();
        return redirect('/dashboard/avatars')->with('success','Avatar créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function show(Avatar $avatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit(Avatar $avatar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avatar $avatar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Supprime quand meme ce qu'il ne faut pas
        $destroy = Avatar::find($id);
        $destroy->delete();
        return redirect()->back()->with('warning','Avatar supprimé avec succès');
    }
}
