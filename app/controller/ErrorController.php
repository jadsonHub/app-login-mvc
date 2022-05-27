<?php

namespace App\controller;

require __DIR__ . '/../config/view/View.php';


use App\config\view\View;

class ErrorController
{

    public function errorGet()
    {

        http_response_code(404);
        return View::loadView([
            "view" => 'error/error',
            "title" => 'Ops...',
            "sub_title" => "Parece que deu ruim! :("
        ]);
    }
    public function errorPost()
    {
        http_response_code(404);
        echo json_encode("rota post invalida");
    }
}
