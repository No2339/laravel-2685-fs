<?php

namespace App\Http\Controllers;



use App\Models\Post;
use App\Models\PostStatus;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $posts = Post::with('post_status')->paginate(10);
        $posts = PostResource::collection($posts);
        
        return view('posts.all', compact('posts'));
        
      

    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
            
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    { 
        
        $post->delete();       
        return redirect('posts.all')->with('success', 'Post  deleted successfully!');
    }
}
