<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs=Blog::all();
        return view('pages.readBlogs',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Blog $blog)
    {
        $this->authorize('web',$blog);

        return view('pages.createBlogs');
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
            'titre' => 'required|max:50',
            'texte' => 'required|max:500',
        ]);

        $store= new Blog;
        $store->titre= $request->titre;
        $store->texte= $request->texte;
        $store->user_id=Auth::user()->id;
        $store->save();
        return redirect('/dashboard/blogs')->with('success','Article créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit=Blog::find($id);
        $this->authorize('web',$edit);
        return view('pages.editBlogs',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|max:50',
            'texte' => 'required|max:500',
        ]);

        $update=Blog::find($id);
        $update->titre= $request->titre;
        $update->texte= $request->texte;
        $update->user_id=Auth::user()->id;
        $update->save();
        return redirect('/dashboard/blogs')->with('success','Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy= Blog::find($id);
        $destroy->delete();
        return redirect('/dashboard/blogs')->with('success','Article supprimé avec succès');
    }
}
