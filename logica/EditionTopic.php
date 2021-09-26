<?php

include_once 'percistencia/Conexion.php';
include_once 'percistencia/EditiontopicDAO.php';

class EditionTopic
{
    private $id;
    private $accepted;
    private $rejected;
    private $idEdition;
    private $idTopic;
    private $conexion;
    private $editionTopicDAO;

    /**
     * @param $id
     * @param $accepted
     * @param $rejected
     * @param $idEdition
     * @param $idTopic
     */
    public function __construct($id = "", $accepted = "", $rejected = "", $idEdition = "", $idTopic = "")
    {
        $this->id = $id;
        $this->accepted = $accepted;
        $this->rejected = $rejected;
        $this->idEdition = $idEdition;
        $this->idTopic = $idTopic;
        $this->conexion = new Conexion();
        $this->editionTopicDAO = new EditiontopicDAO($id, $accepted, $rejected, $idEdition, $idTopic);
    }


    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionTopicDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->accepted = $resultado[0];
        $this->rejected = $resultado[1];
        $this->idEdition = $resultado[2];
        $this->idTopic = $resultado[3];

        $this->conexion->cerrar();
    }

    public function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionTopicDAO->consultarTodos());
        $resultados = array();
        while (($resultado = $this->conexion->extraer()) != null) {
            array_push($resultados, new EditionTopic($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4]));
        }
        $this->conexion->cerrar();
        return $resultados;
    }

    public function consultarRejected($year)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionTopicDAO->consultarSumRejected($year));
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }

    public function consultarAccepted($year)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionTopicDAO->consultarSumAccepted($year));
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }

    public function consultarAcceptedTopic($year, $topic)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionTopicDAO->consultarByTopicAccepted($year, $topic));
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }

    public function consultarRejectedTopic($year, $topic)
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionTopicDAO->consultarByTopicRejected($year, $topic));
        $resultado = $this->conexion->extraer();
        return $resultado[0];
    }


    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getAccepted()
    {
        return $this->accepted;
    }

    /**
     * @return mixed|string
     */
    public function getRejected()
    {
        return $this->rejected;
    }

    /**
     * @return mixed|string
     */
    public function getIdEdition()
    {
        return $this->idEdition;
    }

    /**
     * @return mixed|string
     */
    public function getIdTopic()
    {
        return $this->idTopic;
    }


}