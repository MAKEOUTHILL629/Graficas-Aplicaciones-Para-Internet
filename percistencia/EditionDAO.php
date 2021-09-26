<?php

class EditionDAO
{
    private $id;
    private $name;
    private $year;
    private $startDate;
    private $endDate;
    private $internationalCollaboration;
    private $numberOfKeyNotes;

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
    }


    public function consultar()
    {
        return "SELECT name, year, startDate, endDate, internationalCollaboration, numberOfKeynotes
                FROM edition
                WHERE idEdition = " . $this->id;
    }

    public function consultarTodos()
    {
        return "SELECT idEdition, name, year, startDate, endDate, internationalCollaboration, numberOfKeynotes
                FROM edition";
    }


}