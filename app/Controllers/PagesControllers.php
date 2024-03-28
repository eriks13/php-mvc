<?php


namespace app\Controllers;

use app\Models\Post;

class PagesControllers{

    public function index()
    {
        $posts = Post::all();
        return view("index.view.php", ["posts"=> $posts]);
    }


}