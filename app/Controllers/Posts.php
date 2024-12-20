<?php 
/*
namespace App\Controllers;

class Posts extends BaseController{
    public function index(){
        return view('Posts/index');
    }
}*/

namespace App\Controllers;

class Posts extends BaseController
{
    public function index(){
        return view('Posts/index');
    }

    public function about()
    {
        // Page "À propos"
      return view('Posts/about');
    }

    public function contact()
    {
        // Page "Contact"
return view('Posts/contact') ;   }
}
