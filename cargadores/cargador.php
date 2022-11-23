<?php

function miautocargador($clase){

    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/concurso/Clases/'.$clase.'.php')){
        require_once $_SERVER['DOCUMENT_ROOT'].'/concurso/Clases/'.$clase.'.php';
    } 
    else
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/concurso/helper/'.$clase.'.php')){
        require_once $_SERVER['DOCUMENT_ROOT'].'/concurso/helper/'.$clase.'.php';
    } else
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/concurso/vendor/'.$clase.'.php')){
        require_once $_SERVER['DOCUMENT_ROOT'].'/concurso/vendor/'.$clase.'.php';
    } else
    if(file_exists($_SERVER['DOCUMENT_ROOT'].'/concurso/css/'.$clase.'.css')){
        require_once $_SERVER['DOCUMENT_ROOT'].'/concurso/css/'.$clase.'.css';
    } 
    
    else {
        echo '<h1>No se ha encontrado la clase</h1>';
    }
}
spl_autoload_register("miautocargador");