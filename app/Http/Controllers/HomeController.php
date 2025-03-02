<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countusers = User::count();
        $users = Post::with('user')->latest()->first();
        $countposts=Post::with('user')->count();
        $countComments=Comment::with('user')->count();
        $countreaction=Reaction::with('user')->count();
        $comments=Comment::with('user')->latest()->first();
        $latestUser = User::latest()->first();
        $latestDelete = User::onlyTrashed()->latest('deleted_at')->first();
        return view('welcome', compact('countusers' , 'countreaction',
        'latestUser','users' , 'latestDelete','comments' ,'countposts' ,'countComments' ));
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
