<?php

require __DIR__ . '/../mensagem/mensagem.php';


function validar(string $uri, string $page, array $arrValidacao)
{
    $result = [];
    foreach ($arrValidacao as $indice => $value) {
        if (!str_contains($value, "|")) {

            $result[$indice] = (singleValidation($indice, $value, $uri, $page));
        }
        foreach ((multValidate($indice, $value, $uri, $page)) as $indices) {
            $result[$indice] = $indices;
        }
    }
    return $result;
}

function singleValidation($indice, $validate, $uri, $page)
{

    if (!str_contains($validate, '|')) {
        return $validate($indice, $uri, $page);
    }
}

function multValidate($indice, $validate, $uri, $page)
{

    $result = [];
    if (str_contains($validate, '|')) {
        $explode = explode('|', $validate);
        foreach ($explode as $indices => $value) {
            if (str_contains($explode[$indices], ':')) {
                [$method, $param] = explode(":", $explode[$indices]);
                $result[$indice] = ($method($indice, $param, $uri, $page));
            } else {
                $method = $explode[$indices];
                $result[$indice] = $method($indice, $uri, $page);
            }
        }
    }

    return $result;
}

function mincaracter($indice, $param, $uri, $page)
{
    $valor = filter_input(INPUT_POST, $indice);
    if (strlen($valor) <= $param) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " com mais de {$param} caracter", $uri);
        return null;
    }
    return $valor;
}

function email($indice, $uri, $page)
{

    $valor = filter_input(INPUT_POST, $indice, FILTER_VALIDATE_EMAIL);

    if (!$valor) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " valido!", $uri);
        return null;
    }
    return $valor;
}

function required($indice, $uri, $page)
{


    $valor = filter_input(INPUT_POST, $indice);
    if (campoVazio($valor)) {
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        dadosPagina($indice . '_' . $page, $valor);
        //criar a mesangem de error para o user
        errorEredirect($indice . '_' . $page, 'Preencha o campo  ' . filterParamentros($indice), $uri);
        return null;
    }
}

function numberMax($indice, $uri, $page)
{
    $valor = floatval(filter_input(INPUT_POST, $indice));
    if ($valor >= 0 && $valor <= 10) {
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        dadosPagina($indice . '_' . $page, $valor);
        //criar a mesangem de error para o user
        errorEredirect($indice . '_' . $page, 'Colocar nota de 0 a 10 no campo ' . filterParamentros($indice), $uri);

        return null;
    }
}

function isNumber($indice, $uri, $page)
{

    $valor = filter_input(INPUT_POST, $indice);

    if (doubleval($valor)) {
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        dadosPagina($indice . '_' . $page, $valor);
        //criar a mesangem de error para o user
        errorEredirect($indice . '_' . $page, 'Colocar um numero valido  ' . filterParamentros($indice), $uri);

        return null;
    }
}


function campoVazio($campo)
{

    if (!empty(ltrim($campo, ' '))) {
        return true;
    }
    return false;
}
function unique($indice, $param, $uri, $page)
{

    $valor = filter_input(INPUT_POST, $indice);
    if (campoVazio($valor)) {
        if ($valor === '1') {
            dadosPagina($indice . "_" . $page, $valor);

            errorEredirect($indice, 'Este ' . filterParamentros($indice) . ' já existe', $uri);
            return null;
        }
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        return null;
    }
}

function filterParamentros($valor)
{
    $filter = [
        'nome_usuario' => 'usuário',
        'validarSenha' => 'repetir senha',
        "senha_usuario" => 'senha',
        "email_usuario" => 'email',
        'mt_pt' => 'português',
        'mt_mat' => 'matematica',
        "mt_bio" => 'biologia',
        "mt_his" => 'historia',
        "mt_qui" => "quimica"
    ];
    foreach ($filter as $indice => $value) {
        if ($indice === $valor) {
            return $value;
        }
    }
    return $valor;
}

function senhaValidate($indice, $param, $uri, $page)
{

    $senha = filter_input(INPUT_POST, $indice);
    $auxSenha = filter_input(INPUT_POST, $param);


    if (campoVazio($senha) && campoVazio($auxSenha)) {
        if ($senha != $auxSenha) {
            dadosPagina($indice, $senha);
            dadosPagina("{$param}_{$page}" . $page, $auxSenha);
            errorEredirect($param . '_' . $page, 'Error  senhas diferentes', $uri);
            return null;
        }
        dadosPagina($indice, $senha);
        dadosPagina("{$param}_{$page}", $auxSenha);
        return $senha;
    } else {
        return null;
    }
}
