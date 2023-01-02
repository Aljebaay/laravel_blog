<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')
        ->with('posts', Post::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);


        $slug = Str::slug($request->title, '-');
        $image_name = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $image_name);

        Post::create([
            'title' => strip_tags($request->input('title')),
            'slug' => strip_tags($slug),
            'description' => strip_tags($request->input('description')),
            'image_path' => strip_tags('/images/'.$image_name),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('blog.show')
        ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
        ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);


        $image_name = uniqid() . '-' . $slug . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $image_name);

        Post::where('slug', $slug)
        ->update([
            'title' => strip_tags($request->input('title')),
            'slug' => strip_tags($slug),
            'description' => strip_tags($request->input('description')),
            'image_path' => strip_tags('/images/'.$image_name),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog/' . $slug)
        ->with('message', 'The post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Post::where('slug', $slug)->delete();

        return redirect('/blog')
        ->with('message', 'The post has been deleted.');

    }
}
