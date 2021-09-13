<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
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
        return view('pages.createAvatars');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store= new Avatar;
        $request->file('src')->storePublicly('img/','public');
        $store->src = $request->file('src')->hashName();
        $store->save();
        return redirect('/dashboard/avatars');
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
        if ($destroy->src != 'avatarFemme1.jpg'||$destroy->src != 'avatarFemme2.jpg'||$destroy->src !='imgAvatar1.jpg'||$destroy->src !='imgAvatar2.jpg'||$destroy->sr != 'imgAvatar3.jpg') {
            Storage::disk('public')->delete('img/'.$destroy->src);
            $destroy->delete();
        }
        return redirect('/dashboard/avatars');
    }
}
