<?php

namespace App\controller;

require __DIR__ . '/../config/view/View.php';
require __DIR__ . '/../helpers/validacao/validacao.php';
require __DIR__ . '/../helpers/calculos/calculo.php';

use App\config\view\View;

class UserController
{


    public function index()
    {
        return View::loadView([
            "view" => 'user/dashboard',
            "title" => 'Dashboard',
            "sub_title" => "dashboard Usuário"
        ]);
    }

    public function txtParam($param)
    {
        return $param;
    }

    public function fmrLogin()
    {

        return View::loadView([
            "view" => 'user/login',
            "title" => 'Login',
            "sub_title" => "Login Usuário"
        ]);
    }

    public function fmrCriar()
    {
        return View::loadView([
            "view" => 'user/criar',
            "title" => 'Criar conta',
            "sub_title" => "Criar conta"
        ]);
    }

    public function postLogin()
    {
        $validacao =  validar('/user/login', 'login', [
            "senha_usuario" => "required",
            "nome_usuario" => "required"
        ]);
    }
    public function fmrCalculo()
    {
        return View::loadView([
            "view" => 'user/atv',
            "title" => 'Calculo',
            "sub_title" => "Calculo PHP"
        ]);
    }

    public function postCalculo()
    {
        $curso = [
            "medicina" => [
                "mt_pt" => 2.0,
                "mt_mat" => 2.0,
                "mt_bio" => 3.0,
                "mt_qui" => 2.0,
                "mt_his" => 1.0
            ],
            "bio-medicina" => [
                "mt_pt" => 1,
                "mt_mat" => 2,
                "mt_his" => 1,
                "mt_bio" => 4,
                "mt_qui" => 2
            ]
        ];
        $validacao =  validar('/user/calculo', 'calculo', [
            'mt_pt' => 'required|isNumber|numberMax',
            'mt_mat' => 'required|isNumber|numberMax',
            "mt_bio" => 'required|isNumber|numberMax',
            "mt_his" => 'required|isNumber|numberMax',
            "mt_qui" => "required|isNumber|numberMax",
            "op-curso" => "required"
        ]);

        if ($curso[$validacao['op-curso']]) {

            return View::loadView([
                "view" => 'user/result',
                "title" => 'Resultado',
                "sub_title" => "Calculo PHP",
                "media" => media($validacao, $curso[$validacao['op-curso']]),
                "mediaP" =>  mediaPonderada($validacao, $curso[$validacao['op-curso']]),
                "nome_curso" => $validacao['op-curso'] 
            ]);
        }
    }

    public function postCriar()
    {
        $v =  validar('/user/criar', 'criar', [
            "senha_usuario" => "required|mincaracter:2|senhaValidate:validarSenha",
            "nome_usuario" => "required|mincaracter:2|unique:usuario",
            "email_usuario" => 'required|unique:usuario|email',
            "validarSenha" => 'required|mincaracter:2'
        ]);
        if ($v) {
        }
    }
}
