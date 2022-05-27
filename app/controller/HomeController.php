<?php

namespace App\controller;

require __DIR__.'/../config/view/View.php';

use App\config\view\View;

class HomeController{

    public  function index(){

        return View::loadView([
            "view" => 'home/index',
            "title" => 'Home',
            "sub_title" => "Pagina de Home"
        ]);
    }

}