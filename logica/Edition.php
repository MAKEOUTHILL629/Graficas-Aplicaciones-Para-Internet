<?php
include_once 'percistencia/Conexion.php';
include_once 'percistencia/EditionDAO.php';

class Edition
{
    private $id;
    private $name;
    private $year;
    private $startDate;
    private $endDate;
    private $internationalCollaboration;
    private $numberOfKeyNotes;
    private $editionDAO;
    private $conexion;

    /**
     * @param $id
     * @param $name
     * @param $year
     * @param $startDate
     * @param $endDate
     * @param $internationalCollaboration
     * @param $numberOfKeyNotes
     */
    public function __construct($id = "", $name = "", $year = "", $startDate = "", $endDate = "", $internationalCollaboration = "", $numberOfKeyNotes = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->year = $year;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->internationalCollaboration = $internationalCollaboration;
        $this->numberOfKeyNotes = $numberOfKeyNotes;
        $this->conexion = new Conexion();
        $this->editionDAO = new EditionDAO($id, $name, $year, $startDate, $endDate, $internationalCollaboration, $numberOfKeyNotes);
    }

    public function consultar()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionDAO->consultar());
        $resultado = $this->conexion->extraer();
        $this->name = $resultado[0];
        $this->year = $resultado[1];
        $this->startDate = $resultado[3];
        $this->endDate = $resultado[4];
        $this->internationalCollaboration = $resultado[5];
        $this->numberOfKeyNotes = $resultado[6];
        $this->conexion->cerrar();
    }

    public function consultarTodos()
    {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->editionDAO->consultarTodos());
        $resultados = array();
        while (($resultado = $this->conexion->extraer()) != null) {
            array_push($resultados, new Edition($resultado[0], $resultado[1], $resultado[2], $resultado[3], $resultado[4], $resultado[5], $resultado[6]));
        }
        $this->conexion->cerrar();
        return $resultados;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed|string
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed|string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed|string
     */
    public function getInternationalCollaboration()
    {
        return $this->internationalCollaboration;
    }

    /**
     * @return mixed|string
     */
    public function getNumberOfKeyNotes()
    {
        return $this->numberOfKeyNotes;
    }


}