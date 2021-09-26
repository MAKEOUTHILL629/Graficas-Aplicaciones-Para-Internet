<?php

class EditiontopicDAO
{
    private $id;
    private $accepted;
    private $rejected;
    private $idEdition;
    private $idTopic;

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
    }


    public function consultar()
    {
        return "SELECT accepted, rejected, edition_idEdition, topic_idTopic
                FROM editiontopic
                WHERE idEditionTopic = " . $this->id;
    }

    public function consultarTodos()
    {
        return "SELECT idEditionTopic, accepted, rejected, edition_idEdition, topic_idTopic
                FROM editiontopic";
    }

    public function consultarSumAccepted($year)
    {
        return "SELECT SUM(e.accepted) FROM editiontopic as e LEFT JOIN edition as ed ON e.edition_idEdition = ed.idEdition WHERE ed.year = ". $year;
    }

    public function consultarSumRejected($year)
    {
        return "SELECT SUM(e.rejected) FROM editiontopic as e LEFT JOIN edition as ed ON e.edition_idEdition = ed.idEdition WHERE ed.year = ". $year;
    }

    public function consultarByTopicAccepted($year, $topic){
        return "SELECT SUM(e.accepted) FROM editiontopic as e LEFT JOIN edition as ed ON e.edition_idEdition = ed.idEdition LEFT JOIN topic as top ON e.topic_idTopic = top.idTopic WHERE ed.year = ". $year . " AND top.name = '". $topic ."'";
    }

    public function consultarByTopicRejected($year, $topic){
        return "SELECT SUM(e.rejected) FROM editiontopic as e LEFT JOIN edition as ed ON e.edition_idEdition = ed.idEdition LEFT JOIN topic as top ON e.topic_idTopic = top.idTopic WHERE ed.year = ". $year . " AND top.name = '". $topic ."'";
    }


}