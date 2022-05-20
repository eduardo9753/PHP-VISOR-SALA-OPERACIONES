<?php

include_once('config/conexionMysql.php');

class ModeloEvento
{
    public $PDO;

    public function __construct()
    {
        try {
            $this->PDO = new ClassConexion(); //INICIANDO LA CONEXION A LA BD
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    public function eventoById(Evento $evento)
    {
        try {
            $sql = 'SELECT e.id , e.title AS "title", e.descripcion,e.paciente AS "paciente", e.medico AS "doctor" , e.color AS "backgroundColor", e.textColor AS "textColor",
                   e.`allDay` AS "allDay",
                   e.`START` AS "start",
                   e.`end` AS "end",
                   e.allDay AS "allDay",
                   e.id_usuario AS "id_usuario",
                   e.id_estado AS "id_estado"
         FROM evento e WHERE e.id=?';
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute(array($evento->getid()));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
    public function updateMoverEvento(Evento $evento)
    {
        try {
            $sql = "UPDATE evento SET title=?,
                  descripcion=?,
                  paciente=?,
                  medico=?,
                  color=?,
                  textColor=?,
                  START=?,
                  END=?,
                  id_usuario=? WHERE id = ?";
            $stm = $this->PDO->ConectarBD()->prepare($sql)->execute(
                array(
                    $evento->gettitle(),
                    $evento->getdescripcion(),
                    $evento->getpaciente(),
                    $evento->getmedico(),
                    $evento->getcolor(),
                    $evento->gettextColor(),
                    $evento->getstart(),
                    $evento->getend(),
                    $evento->getid_usuario(),
                    $evento->getid()
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //ACTUALIZAR TODOS LOS DATOS DEL EVENTO
    public function updateEvento(Evento $evento)
    {
        try {
            $sql = "UPDATE evento SET title=?,
                  descripcion=?,
                  paciente=?,
                  medico=?,
                  color=?,
                  textColor=?,
                  START=?,
                  END=?,
                  id_usuario=? WHERE id = ?";
            $stm = $this->PDO->ConectarBD()->prepare($sql)->execute(
                array(
                    $evento->gettitle(),
                    $evento->getdescripcion(),
                    $evento->getpaciente(),
                    $evento->getmedico(),
                    $evento->getcolor(),
                    $evento->gettextColor(),
                    $evento->getstart(),
                    $evento->getend(),
                    $evento->getid_usuario(),
                    $evento->getid()
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //REGIATRAR SUGERENCIAS
    public function saveEvento(Evento $evento)
    {
        try {
            $sql = "INSERT INTO evento(title,descripcion,paciente,medico,color,textColor,START,end,allDay,id_usuario,id_estado) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $stm = $this->PDO->ConectarBD()->prepare($sql)->execute(
                array(
                    $evento->gettitle(),
                    $evento->getdescripcion(),
                    $evento->getpaciente(),
                    $evento->getmedico(),
                    $evento->getcolor(),
                    $evento->gettextColor(),
                    $evento->getstart(),
                    $evento->getend(),
                    $evento->getallDay(),
                    $evento->getid_usuario(),
                    $evento->getid_estado()
                )
            );
            return $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //MODIFICABLE
    public function allEvent()
    {
        try {
            $sql = 'SELECT e.id , e.title AS "title", e.descripcion,e.paciente AS "paciente", e.medico AS "doctor" , e.color AS "backgroundColor", e.textColor AS "textColor",
                   e.`allDay` AS "allDay",
                   e.`START` AS "start",
                   e.`end` AS "end",
                   e.allDay AS "allDay",
                   e.id_usuario AS "id_usuario",
                   e.id_estado AS "id_estado"
                FROM evento e';
            $stm = $this->PDO->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
