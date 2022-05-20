<?php

class Video
{

    private $id_video;
    private $nombre_video;
    private $descripcion_video;
    private $id_usuario;

    public function __construct()
    {
        $this->id_video = "";
        $this->nombre_video = "";
        $this->descripcion_video = "";
        $this->id_usuario = "";
    }


    function setid_video($id_video)
    {
        $this->id_video = $id_video;
    }
    function getid_video()
    {
        return $this->id_video;
    }


    function setnombre_video($nombre_video)
    {
        $this->nombre_video = $nombre_video;
    }
    function getnombre_video()
    {
        return $this->nombre_video;
    }


    function setdescripcion_video($descripcion_video)
    {
        $this->descripcion_video = $descripcion_video;
    }
    function getdescripcion_video()
    {
        return $this->descripcion_video;
    }

    function setid_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
    function getid_usuario()
    {
        return $this->id_usuario;
    }
}
