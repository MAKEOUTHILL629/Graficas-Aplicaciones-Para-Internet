<?php

class TopicDAO
{
    private $id;
    private $name;

    /**
     * @param $id
     * @param $name
     */
    public function __construct($id="", $name="")
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function consultar()
    {
        return "SELECT name
                FROM topic
                WHERE idTopic = " . $this->id;
    }

    public function consultarTodos()
    {
        return "SELECT idTopic, name
                FROM topic
                ORDER BY name asc";
    }


}