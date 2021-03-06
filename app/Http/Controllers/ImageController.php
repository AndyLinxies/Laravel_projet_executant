<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('isAdmin')->only(['index', 'store','create','destroy']);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Image::all();
        return view('pages.readImages',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Categorie::all();
        return view('pages.createImages',compact('categories'));
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
            'src'=>'required|image',
        ]);

        $store= new Image;
        $request->file('src')->storePublicly('img/','public');
        $store->src = $request->file('src')->hashName();
        $store->categorie_id=$request->categorie_id;
        $store->save();
        return redirect('/dashboard/images')->with('success','Image créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyCategorie= Categorie::find($id);
        $destroy= Image::find($id);
        $destroy->delete();
        $destroyCategorie->delete();
        return redirect()->back()->with('warning','Image supprimée avec succès');
    }
    public function download($id){
        $download= Image::find($id);

        return Storage::disk('public')->download('img/'.$download->src);
    }
}
