<?php
    ini_set('display_errors', 1);

    require_once 'config/configBD.php';
    require_once 'config/configVal.php';
    if (!isset($_GET["controlador"])) $_GET["controlador"] = constant("CONTROLADOR_POR_DEFECTO");
    if (!isset($_GET["accion"])) $_GET["accion"] = constant("ACCION_POR_DEFECTO");

    $rutaControlador = 'controladores/' . $_GET["controlador"] . '.php';

    /* Verifica si existe el controlador */
    if (!file_exists($rutaControlador)) $rutaControlador = 'controladores/' . constant("CONTROLADOR_POR_DEFECTO") . '.php';
   

    require_once $rutaControlador;
    $nombreControlador = $_GET["controlador"];
    $controlador = new $nombreControlador();

  
    $datosAVista["data"] = array();
    if (method_exists($controlador, $_GET["accion"])) $datosAVista["data"] = $controlador->{$_GET["accion"]}();

// header("Location:index.php?controlador=controlador_registro&accion=register");
  

    require_once 'vistas/template/cabecera.html';
    require_once 'vistas/' . $controlador->vista . '.php';
    require_once 'vistas/template/pie.html';
?>
