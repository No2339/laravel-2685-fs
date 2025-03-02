<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $users = User::paginate(10); 
        $countusers=User::count();
        $userslast=User::latest()->first();
        $latestDelete = User::onlyTrashed()->latest()->first();
        
        return view('users.all', compact('users' ,'userslast' ,'countusers' ,'latestDelete' ));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUsersRequest $request)
    {
        $validatedData = $request->validated();

            User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'mobile'   => $validatedData['mobile'],
            'roles'    => $validatedData['roles'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect('/')->with('success', 'User added successfully!');
    }
    
    /**
     * Display the specified resource.
     */
        public function show($id)
        {
            
            $users = User::with('posts')->where('id', $id)->first();
            $usersCount = $users->posts()->count();
            $latest_post = $users->posts()->latest()->first();
            $snigelusers= UserResource::make($users);
            return view('users.show', compact( 'snigelusers', 'users',  'usersCount', 'latest_post' ));
            
           

        }


        public function search(Request $request) {
            $query = trim($request->input('query'));
            $users = User::where('name', 'LIKE', "$query%")->
                orWhere('id', $query)->paginate(10);;
            return view('users.all', compact('users'));
        }
        
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, User $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
    
     
        foreach ($user->comments as $comment) {
            $comment->replies()->delete();
        }
    
        
        $user->replies()->delete();
    
      
        $user->reactions()->delete();
    
     
        $user->comments()->delete();
    
       
        foreach ($user->posts as $post) {
            
            $post->reactions()->delete();
        
            foreach ($post->comments as $comment) {
                $comment->replies()->delete();
            }
            $post->comments()->delete();
         
            $post->delete();
        }
    
        
        $user->delete();
    
        return redirect('/')->with('success', 'User deleted successfully!');
    }
    
    

};    
