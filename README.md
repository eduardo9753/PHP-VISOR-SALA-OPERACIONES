# SISTEMA DE HORARIOS MEDICOS
Aplicativo Web para el control y registro de los horarios medicos de cada consultorio.
------------

HERRAMIENTAS :
- Base de Datos: MySQL.
- Estilos: CSS3 y Bootstrap 4.
- Lenguaje : Lenguaje PHP.

## Arquitectura MVC
1. MODELO: representación de los datos que maneja el sistema, su lógica de negocio, y sus mecanismos de persistencia.
2. VISTA: Información que se envía al cliente y los mecanismos interacción con éste.
3. CONTROLADOR: intermediario entre el Modelo y la Vista, gestionando el flujo de información entre ellos y las transformaciones para adaptar los datos a las necesidades de cada uno.

## Imagenes
Vita Administrador:
- 1
![adm_medico_registrado01](https://user-images.githubusercontent.com/68178186/166942936-27b4d677-c034-429b-9850-02779f1b56a8.PNG)
- 2
![adm_medico_calendario02](https://user-images.githubusercontent.com/68178186/166942958-64c13c6f-98d5-45d0-b205-3991929397cd.PNG)
- 3
![adm_medico_calendario_aprobados03](https://user-images.githubusercontent.com/68178186/166942971-2f9dc701-60cd-4df4-a7ec-9eb2c52c5a5b.PNG)
- 4
![adm_lista_medicos_04](https://user-images.githubusercontent.com/68178186/166943017-0dc5c14c-df59-4e80-b82c-ae9bc0be0541.PNG)
- 5
![adm_lista_consultorio_05](https://user-images.githubusercontent.com/68178186/166943078-3e24bda8-d33d-41b8-948f-caf93e2c5837.PNG)
- 6
![adm_lista_especialidad_06](https://user-images.githubusercontent.com/68178186/166943091-f9f7dd77-c587-44cc-90e5-99ce000ba709.PNG)
- 7
![adm_lista_compañias_07](https://user-images.githubusercontent.com/68178186/166943099-137efa34-580c-4a2c-8532-e29a03981807.PNG)
- 8
![adm_graficos_08](https://user-images.githubusercontent.com/68178186/166943109-26adf43b-2c4b-431f-81f2-dfa945228874.PNG)

Vita Medico:
- 9
![medico_registrado01](https://user-images.githubusercontent.com/68178186/166943995-9f587a2a-500e-4f54-bfe3-18a6e2c73589.PNG)
- 10
![medico_especialidades02](https://user-images.githubusercontent.com/68178186/166944015-d9bf80bb-fd83-43fb-9c49-7f9099d8482a.PNG)


### SCRIPT DE LA BASE DE DATOS
````sql
CREATE DATABASE visor_SOP DEFAULT CHARACTER SET UTF8MB4;
SET default_storage_engine = INNODB;



USE visor_SOP;



#-------------------------------------------------------------------------------------------------
#TABLA USUARIO
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS usuario(
  id_usuario            int PRIMARY KEY AUTO_INCREMENT,
  nombre_usuario        VARCHAR(100) NOT NULL,
  contra_usuario        VARCHAR(100) NOT NULL,
  perfil                VARCHAR(100) NULL,
  area_usuario          VARCHAR(100) NULL,
  foto                  VARCHAR(100) NULL default 'foto.jpg'
)ENGINE=InnoDB default charset=UTF8MB4;
#-------------------------------------------------------------------------------------------------





#-------------------------------------------------------------------------------------------------
#TABLA VIDEOS
#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS VIDEO(
  id_video             INT PRIMARY KEY AUTO_INCREMENT,
  nombre_video         VARCHAR(100) NOT NULL,
  descripcion_video    TEXT NULL,
  id_usuario           INT  NULL,
  fecha_registro_sys   TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  fecha_update_sys     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB default charset=UTF8MB4;
#-------------------------------------------------------------------------------------------------








#-------------------------------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS TIEMPO_SOP(
  ID_NHC               VARCHAR(15) PRIMARY KEY NULL,
  NOMBRE_PAC           VARCHAR(100) NULL,
  DOCUMENTO            VARCHAR(15) NULL,
  PATERNO              VARCHAR(40) NULL,
  MATERNO              VARCHAR(40) NULL,
  SEXO_PAC             VARCHAR(2) NULL,
  NOMBRE_PROFESIONAL   VARCHAR(100) NULL,
  NOMBRE_ESPECIALIDAD  VARCHAR(100) NULL,
  PRIMER_NOMBRE        VARCHAR(40) NULL,
  SEGUNDO_NOMBRE       VARCHAR(40) NULL,
  FECHA_CHEKLIST       VARCHAR(40) NULL,
  FECHA_RECUPERACION   VARCHAR(40) NULL,
  FECHA_SALIDA         VARCHAR(40) NULL,
  FECHA_REAL           DATE NULL,
  ESTADO               INT  NULL,
  ESTADO_BAJA          INT  NULL,
  id_usuario           INT  NULL,
  fecha_registro_sys   TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  fecha_update_sys     TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB default charset=UTF8MB4;
#TABLA TIEMPO SOP
#---> 1 : ES SALA
#---> 2 : EN RECUPERACION
#---> 3 : DE ALTA
#---> 4 : DESAPARECE DEL VISOR
#---> 5 : FALLECIDO
#ESTADO_BAJA: CAUNDO PASA AL ESTADO = 3 , ACTUALIZAMOS EL DATO DESPUES DE 1 HORA 
#-------------------------------------------------------------------------------------------------







#-------------------------------------------------------------------------------------------------
#FORANEAS DATA
#-------------------------------------------------------------------------------------------------
ALTER TABLE TIEMPO_SOP ADD FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario);
ALTER TABLE VIDEO ADD FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario);
#-------------------------------------------------------------------------------------------------








#-------------------------------------------------------------------------------------------------
#UPDATE DATA -  JALAR POR FECHA ACTUAL Y EN EL ULTIMO PASO ACTUALIZAR LA FECHA A "0000-00-00"
#-------------------------------------------------------------------------------------------------
SELECT * FROM tiempo_sop TSOP WHERE TSOP.ESTADO IN ('1','2','3')
              AND DATE_FORMAT(TSOP.FECHA_REAL,'%d') = '15'
              ORDER BY TSOP.FECHA_CHEKLIST ASC

````

