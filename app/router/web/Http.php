<?php

namespace App\web;


class Http{

    public function __construct()
    {
        
    }
    
    public static function getRoutes(){

        /* para rotas que precise de parametros tipo id
        colocar ex: indice -> /admin/update/ E no valor -> AdminController@update
        dentro do AdminController criar um method que recebe um parametro,
         o router vai colocar o parametro la pra vc!
        */
        return [
            "GET" => [
                "/" => "HomeController@index",
                "/user/login" => "UserController@fmrLogin",
                "/user/detalhes/" => "UserController@txtParam",
                "/user/dashboard" => "UserController@index",
                "/user/criar" => "UserController@fmrCriar",
                "/user/calculo" => "UserController@fmrCalculo"
            ],

            "POST" => [
                "/user/login" => "UserController@postLogin",
                "/user/criar" => "UserController@postCriar",
                "/user/calculo" => "UserController@postCalculo"
            ]
        ];
    }

}