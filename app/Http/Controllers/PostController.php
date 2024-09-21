<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'max:2048', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => ['required'],
        ]);
        $filename = time() . '_' . $request->image->getClientOriginalName();
        $filepath = $request->image->storeAs('uploads', $filename, 'public');
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->image = $filepath;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'image' => ['max:2048', 'image'],
            'title' => ['string', 'max:255'],
            'category_id' => ['integer'],
            'description' => [],
        ]);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->image->getClientOriginalName();
            $filepath = $request->image->storeAs('uploads', $filename, 'public');
            File::delete(public_path('storage/'.$post->image));
            $post->image = $filepath;
        }
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
