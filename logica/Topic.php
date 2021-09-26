<?php

include_once 'percistencia/Conexion.php';
include_once 'percistencia/TopicDAO.php';

class Topic
{
    private $id;
    private $name;
    private $conexion;
    private $topicDAO;

    /**
     * @param $id
     * @param $name
     */
    public function __construct($id="", $name="")
    {
        $this->id = $id;
        $this->name = $name;
        $this->conexion = new Conexion();
        $this->topicDAO = new TopicDAO($id, $name);
    }

    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->topicDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->name = $resultado[0];
        $this->conexion->cerrar();
    }

    public function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->topicDAO->consultarTodos());
        $resultados = array();
        while (($resultado = $this->conexion->extraer()) != null) {
            array_push($resultados, new Topic($resultado[0], $resultado[1]));
        }
        $this->conexion->cerrar();
        return $resultados;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}