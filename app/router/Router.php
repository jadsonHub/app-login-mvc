<?php

// como se fosse o nome do pacote, 
namespace App\router;

//como não tem composer instalado, vamo fazer os imports na mão!
require __DIR__ . '/web/Http.php';

use App\web\Http;

//classe responsavel pelas rotas do projeto, aqui pegamos a uri e o method pra chamar o controller
class Router
{

    protected string $request_uri;
    protected string $request_method;
    protected array $routes;
    protected string $param;

    public function __construct()
    {
        $this->request_uri = $this->getUri();
        $this->request_method = $this->getMethod();
        $this->routes =  Http::getRoutes();
        $this->param = $this->getParam();
    }

    public function Router()
    {
        return $this->Routes();
    }

    protected function Routes()
    {

        if (isset($this->routes[$this->request_method][$this->filterRoute()])) {

            $controller = explode('@', $this->routes[$this->request_method][$this->filterRoute()]);
            $instancia = $this->requireController($controller[0]);
            $method = $controller[1];
            if (empty($this->param)) {
                return $instancia->$method();
            }
            return $instancia->$method($this->param);
        }

        return $this->errorRoutes();
    }

    protected function errorRoutes()
    {
        $instancia = $this->requireController('ErrorController');
        
        if ($this->request_method === 'GET') {
           
           return $instancia->errorGet();
        }else{
            return $instancia->errorPost();
        }
        
    }

    protected function  filterRoute()
    {
        $rota = explode('/', $this->request_uri);
        if ($this->getParam()) {
            unset($rota[3]);
            return implode('/', $rota) . '/';
        }
        return $this->request_uri;
    }

    protected function getParam()
    {

        $param = explode('/', $this->request_uri);
        if (isset($param[3])) {
            return $param[3];
        }
        return '';
    }

    protected function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    protected function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    protected  function requireController(string $controller)
    {
        //importa o arquvio de controller
        require __DIR__ . '/../controller/' . $controller . '.php';
        // string de intancia do controller 
        $instancia = "App\\controller\\" . $controller;
        // retorna a instancia 
        return new $instancia;
    }
}
