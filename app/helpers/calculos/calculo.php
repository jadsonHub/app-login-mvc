<?php


function mediaPonderada($notas = [], $peso = [])
{

    unset($notas['op-curso']);
    $nota =
        (($notas['mt_pt'] * $peso['mt_pt'])
        + ($notas['mt_mat'] * $peso['mt_mat'])
        + ($notas['mt_bio'] * $peso['mt_bio'])
        + ($notas['mt_his'] * $peso['mt_his'])
        + ($notas['mt_qui'] * $peso['mt_qui']))
       / ($peso['mt_pt'] +
        $peso['mt_mat'] +
        $peso['mt_bio'] +
        $peso['mt_his'] +
        $peso['mt_qui']);

     

    return $nota;
    
}

function media($notas = [], $peso = [])
{
    $media =
       ( $notas['mt_pt']
        + $notas['mt_mat'] 
        + $notas['mt_bio'] 
        + $notas['mt_his'] 
        + $notas['mt_qui'])
        /
        count($peso);

    return $media;
}

