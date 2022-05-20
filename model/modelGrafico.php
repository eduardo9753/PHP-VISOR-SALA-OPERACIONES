<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloGrafico
{

    public $PDO;
    public $MYSQL;

    public function __construct()
    {
        try {
            $this->PDO = new ConexionOracle(); //INICIANDO LA CONEXION A LA BD
            $this->MYSQL = new ClassConexion();
        } catch (Exception $th) {
            throw $th;
        }
    }

    /*$sql = "SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('1','2','3')
    AND DATE_FORMAT(TSOP.FECHA_REAL,'%d') = '$diaActual' 
    ORDER BY TSOP.FECHA_CHEKLIST ASC";*/

    public function countPacienteSala()
    {
        try {
            $diaActual = date("Y-m-d");
            $sql = "SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('1')
            AND DATE_FORMAT(TSOP.FECHA_REAL,'%Y-%m-%d') = '$diaActual' 
            ORDER BY TSOP.FECHA_CHEKLIST ASC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function countPacienteRecuperacion()
    {
        try {
            $diaActual = date("Y-m-d");
            $sql = "SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('2')
            AND DATE_FORMAT(TSOP.FECHA_REAL,'%Y-%m-%d') = '$diaActual' 
            ORDER BY TSOP.FECHA_CHEKLIST ASC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function countPacienteAlta()
    {
        try {
            $diaActual = date("Y-m-d");
            $sql = "SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('3')
            AND DATE_FORMAT(TSOP.FECHA_REAL,'%Y-%m-%d') = '$diaActual' 
            ORDER BY TSOP.FECHA_CHEKLIST ASC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function countTotal()
    {
        try {
            $diaActual = date("Y-m-d");
            $sql = "SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('1','2','3')
            AND DATE_FORMAT(TSOP.FECHA_REAL,'%Y-%m-%d') = '$diaActual' 
            ORDER BY TSOP.FECHA_CHEKLIST ASC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            $stm->fetchAll(PDO::FETCH_OBJ);
            return $stm->rowCount();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
