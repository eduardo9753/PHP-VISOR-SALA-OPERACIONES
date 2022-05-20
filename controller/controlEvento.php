<?php

//MODEL
include_once('model/modelEvento.php');

//DATOS
include_once('data/evento.php');
include_once('data/correo.php');


//UITLS
include_once('utils/modelSession.php');


class Control
{
    public $MODEL;
    public $SESSION;

    public function __construct()
    {
        $this->MODEL = new ModeloEvento();
        $this->SESSION = new ModeloSession();
    }

    //vista registrar evento
    public function registrarEvento()
    {
        try {
            $this->SESSION->isSession();
            //color de links
            if (isset($_REQUEST['ruta']) == 'registrarEvento') {
                $ruta = 'registrarEvento';
                $show_evento = 'show';
                $active_evento = 'active';
            }
            $titulo = "Registrar Nueva Operacion";

            include_once('view/eventos/registrarEvento.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //consumo de datos para pintar los eventos
    public  function getAllEvent()
    {
        try {
            //session start
            $this->SESSION->isSession();

            $data = $this->MODEL->allEvent();
            echo json_encode($data);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function moverEvento()
    {
        try {
            //session start
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];

            $evento = new Evento();
            $evento->settitle($_POST['txt_titulo']);
            $evento->setdescripcion($_POST['txt_descripcion']);
            $evento->setpaciente($_POST['txt_paciente']);
            $evento->setmedico($_POST['txt_medico']);
            $evento->setcolor($_POST['txt_color']);
            $evento->settextColor($_POST['txt_color_texto']);
            $evento->setstart($_POST['txt_fecha_inicio']);
            $evento->setend($_POST['txt_fecha_fin']);
            $evento->setid_usuario($id_usuario);
            $evento->setid($_POST['txt_id']);

            $save = $this->MODEL->updateMoverEvento($evento);

            if ($save) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //EDITAR EVENTO POR ID
    public function editarEvento()
    {
        try {
            //session start
            $this->SESSION->isSession();
            //color de links
            if (isset($_REQUEST['ruta']) == 'editarEvento') {
                $ruta = 'registrarEvento'; //parta pintar el enlace registrar evento
                $show_evento = 'show';
                $active_evento = 'active';
            }
            if ($_REQUEST['btn-editar-evento']) {
                $evento = new Evento();
                $evento->setid($_POST['txt_id']);
                $titulo = "Actualizar Evento";
                $dataEvento = $this->MODEL->eventoById($evento);
                include_once('view/eventos/actualizarEvento.php');
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALIZAR EVENTO
    public function actualizarEvento()
    {
        try {
            //session start
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];

            $evento = new Evento();
            $evento->settitle($_POST['txt_titulo']);
            $evento->setdescripcion($_POST['txt_descripcion']);
            $evento->setpaciente($_POST['txt_paciente']);
            $evento->setmedico($_POST['txt_medico']);
            $evento->setcolor($_POST['txt_color']);
            $evento->settextColor($_POST['txt_color_texto']);
            $evento->setstart($_POST['txt_fecha_inicio']);
            $evento->setend($_POST['txt_fecha_fin']);
            $evento->setallDay('true');
            $evento->setid_usuario($id_usuario);
            $evento->setid($_POST['txt_id']);

            $save = $this->MODEL->updateEvento($evento);

            if ($save) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }



    public function insertEvento()
    {
        try {
            //session start
            $this->SESSION->isSession();
            $id_usuario = $_SESSION["id_usuario"];
            $fecha_actual = date("Y-m-d" . "00:00:00");
            //$fecha_actual = date("Y-m-d H:i:s");
            //$fecha_mayor = date("Y-m-d H:i:s", strtotime($fecha_actual . "+ 1 days"));

            $fecha_inicio_ = $this->SESSION->formatFecha($_POST['txt_fecha_inicio']);
            $fecha_final_ = $this->SESSION->formatFecha($_POST['txt_fecha_fin']);

            //PARA QUE SE PUEDE VISUALIZAR LA FRANJA
            if ($fecha_inicio_ <= $fecha_actual && $fecha_final_ <= $fecha_actual) {
                $allDay = "true";
            } else {
                $allDay = "";
            }

            $evento = new Evento();
            $evento->settitle($_POST['txt_titulo']);
            $evento->setdescripcion($_POST['txt_descripcion']);
            $evento->setpaciente($_POST['txt_paciente']);
            $evento->setmedico($_POST['txt_medico']);
            $evento->setcolor($_POST['txt_color']);
            $evento->settextColor($_POST['txt_color_texto']);
            $evento->setstart($_POST['txt_fecha_inicio']);
            $evento->setend($_POST['txt_fecha_fin']);
            $evento->setallDay($allDay);
            $evento->setid_estado('1');
            $evento->setid_usuario($id_usuario);

            $save = $this->MODEL->saveEvento($evento);

            if ($save) {
                echo 1;
            } else {
                echo 0;
            }
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
