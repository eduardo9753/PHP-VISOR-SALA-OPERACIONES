<?php

include_once('config/conexionOracle.php');
include_once('config/conexionMysql.php');

class ModeloSop
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


    //DATA PACIENTE ESTADOS
    public function allPaciente()
    {
        try {
            $diaActual = date("Y-m-d");
            $sql = "SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('1','2','3')
            AND DATE_FORMAT(TSOP.FECHA_REAL,'%Y-%m-%d') = '$diaActual' 
            ORDER BY TSOP.FECHA_CHEKLIST ASC";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }

    //PACIENTE FALLECIDO O CRITICO
    public function pacienteCritico(Paciente $paciente)
    {
        try {
            $sql = "UPDATE TIEMPO_SOP SET ESTADO=? WHERE ID_NHC=?";
            $stm = $this->MYSQL->ConectarBD()->prepare($sql);
            $stm->execute(array(
                $paciente->getESTADO(),
                $paciente->getID_NHC()
            ));
            return  $stm;
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}
