<?php

include_once('controller/controlIndex.php');
include_once('controller/controlLogin.php');
include_once('controller/controlGrafico.php');
include_once('controller/controlProfile.php');
include_once('controller/controlEvento.php');
include_once('controller/controlReportes.php');
include_once('controller/controlSop.php');

date_default_timezone_set("America/Lima");

//PHP PDF
require_once 'lib/pdf/fpdf.php';

//PHP EXCEL
require_once 'lib/PHPExcel/Classes/PHPExcel.php';


//VARIABLES CONTROLADORES
$controlIndex = new ControlIndex();
$controlLogin = new ControlLogin();
$controlGrafico = new ControlGrafico();
$controlProfile = new ControlProfile();
$control = new Control();
$controlReporte = new ControlReportes();
$controlSop = new ControlSop();


//LLAMADA DE METODOS
if (!isset($_REQUEST['ruta'])) {
    $controlIndex->index();
} else {
    $peticion = $_REQUEST['ruta'];
    if (method_exists($controlIndex, $peticion)) {
        call_user_func(array($controlIndex, $peticion));
    } else if (method_exists($controlLogin, $peticion)) {
        call_user_func(array($controlLogin, $peticion));
    } else if (method_exists($controlGrafico, $peticion)) {
        call_user_func(array($controlGrafico, $peticion));
    } else if (method_exists($controlProfile, $peticion)) {
        call_user_func(array($controlProfile, $peticion));
    } else if (method_exists($control, $peticion)) {
        call_user_func(array($control, $peticion));
    } else if (method_exists($controlReporte, $peticion)) {
        call_user_func(array($controlReporte, $peticion));
    } else if (method_exists($controlSop, $peticion)) {
        call_user_func(array($controlSop, $peticion));
    } else {
        $controlIndex->NoEncontrado();
    }
}
