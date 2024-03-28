<?php


function get_base_path($path)
 {
    return BASE_PATH . $path;
 }


function dd($value)
{
   echo "<pre>";
   var_dump($value);
   echo "<pre>";

   die();
}

function redirect(string $url)
{
   header("Location: " . $url);
   exit();
}

function view(string $path, array $attribute = []){

   extract($attribute);

   require get_base_path("app/Views/" . $path, $attribute);
   
}