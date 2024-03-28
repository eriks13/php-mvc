<?php
namespace app\Controllers;

use app\Models\Post;

class PostController{

    public function index()
    {
        $posts = Post::all();
        return view("post/index.view.php", compact("posts"));
    }

    public function show($id)
    {
       $posts = Post::findId($id);
       return view("post/show.view.php", compact("posts"));
    }

    public function create()
    {
        return view("post/create.view.php");
    }

    public function store()
    {
        Post::insertRequestAll();

        return redirect("/post");

    }

    public function edit($id)
    {
        $posts =  Post::findId($id);
        return view("post/edit.view.php", compact("posts"));
    }

    public function update($id)
    {
        Post::update($id);

        return redirect("/post");
    }

    public function destroy($id)
    {
        Post::delete($id);

        return redirect("/post");
        
    }
   
}