<?php

namespace App\Controllers;

class HomeView extends BaseController{
    public function secIndex():string{
        return view(name: "Home.HomeView");
    }
}

