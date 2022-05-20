<?php

//MODEL
include_once('model/modelGrafico.php');
include_once('utils/modelMensaje.php');


//DATOS
include_once('data/usuario.php');
include_once('data/video.php');

//UITLS
include_once('utils/modelSession.php');

class ControlGrafico
{

    public $MODELOGRAFICO;
    public $MSG;
    public $SESSION;

    public function __construct()
    {
        $this->MODELOGRAFICO = new ModeloGrafico;
        $this->MSG = new ModeloMensaje();
        $this->SESSION = new ModeloSession();
    }


    public function Graficos()
    {
        try {
            //session start
            $this->SESSION->isSession();

            $titulo = "Graficos";

            //color de links
            if (isset($_REQUEST['ruta']) == 'Graficos') {
                $ruta = 'Graficos';
                $show_grafico = 'show';
                $active_grafico = 'active';
            }

            $dataPacienteSala = $this->MODELOGRAFICO->countPacienteSala();
            $dataPacienteRecu = $this->MODELOGRAFICO->countPacienteRecuperacion();
            $dataPacienteAlta = $this->MODELOGRAFICO->countPacienteAlta();
            $dataTotal = $this->MODELOGRAFICO->countTotal();

            include_once('view/graficos/graficos.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function upload()
    {
        try {
            //session start
            $this->SESSION->isSession();

            //color de links
            if (isset($_REQUEST['ruta']) == 'upload') {
                $ruta = 'upload';
                $show_grafico = 'show';
                $active_grafico = 'active';
            }

            include_once('view/video/videos.php');
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function uploadVideo()
    {
        try {
            //session start
            $this->SESSION->isSession();

            $directorio = "video/";
            $incidenciaFile = $directorio . $_FILES['file_evidencia']['name'];
            move_uploaded_file($_FILES['file_evidencia']['tmp_name'], $incidenciaFile);

            $video = new Video();
            $video->setnombre_video($_POST['']);
            $video->setdescripcion_video($_POST['']);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
