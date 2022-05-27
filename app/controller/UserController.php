<?php

namespace App\controller;

require __DIR__ . '/../config/view/View.php';
require __DIR__ . '/../helpers/validacao/validacao.php';

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
        $validacao =  validar('/user/login','login' ,[
            "senha_usuario" => "required",
            "nome_usuario" => "required"
        ]);

       if($validacao){
      
        $_SESSION['usuario'] = $validacao;

      return  header("Location: /user/dashboard");
      
      
       }
    }

    public function postCriar()
    {
        $v =  validar('/user/criar', 'criar',[
            "senha_usuario" => "required|mincaracter:2|senhaValidate:validarSenha",
            "nome_usuario" => "required|mincaracter:2|unique:usuario",
            "email_usuario" => 'required|unique:usuario|email',
            "validarSenha" => 'required|mincaracter:2'
        ]);
        if($v){
           
        }
    }

  
}
