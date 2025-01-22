<?php

namespace App\Http\Controllers;

class PostController
{
    public function index()
    {
        return 'Hi, I am PostController -> index';
    }


    public function show($id)
    {
        return $id;
    }

}
