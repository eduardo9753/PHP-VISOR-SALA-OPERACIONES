<?php

//MODEL
include_once('model/modelLogin.php');
include_once('utils/modelMensaje.php');
include_once('model/modelAseets.php');


//DATOS
include_once('data/usuario.php');

//UITLS
include_once('utils/modelSession.php');


class ControlIndex
{

    public $MODEL;
    public $MSG;
    public $ASSETS;
    public $SESSION;

    public function __construct()
    {
        $this->MODEL = new ModeloLogin();
        $this->MSG = new ModeloMensaje();
        $this->ASSETS = new ModeloAssets();
        $this->SESSION = new ModeloSession();
    }

    public  function index() //VISTA INDEX
    {
        include_once('view/login/login.php');
    }

    public function dashboard()
    {
        //session start
        $this->SESSION->isSession();

        //color de links
        if (isset($_REQUEST['ruta']) == 'dashboard') {
            $ruta = 'dashboard';
        }

        $titulo = "Dashboard";
        include_once('view/dashboard/menu.php');
    }

    public function NoEncontrado()
    {
        $titulo =  "PAGIN NO ENCONTRADA";
        session_start();
        $_SESSION['CONTROL'] = 0;
        $_SESSION['CONTROL'] = '';
        include_once('view/404/noEncontrado.php');
    }


    public function Close()
    {
        try {
            session_start();
            $_SESSION['CONTROL'] = 0;
            $_SESSION['CONTROL'] = '';
            include_once('view/login/login.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
