<?php

class Cv{
    private $id;
    private $id_user;
    private $title;
    private $experiences;
    private $formations;
    private $loisirs;

    public function __construct(
        int $id = null,
        int $id_user = null,
        string $title = "",
        string $experiences = "",
        string $formations = "",
        string $loisirs = ""
    )
    {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->title = $title;
        $this->experiences = $experiences;
        $this->formations = $formations;
        $this->loisirs = $loisirs;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId_user(){
        return $this->id;
    }
    public function setId_user($id_user){
        $this->id_user = $id_user;
    }
    public function getTitles(){
        return $this->title;
    }
    public function setTitles($title){
    $this->title = $title;
    }
    public function getExperiences(){
        return $this->experiences;
    }
    public function setExperiences($experiences){
        $this->experiences = $experiences;
    }
    public function getFormations(){
        return $this->experiences;
    }
    public function setFormations($formations){
        $this->formations = $formations;
    }
    public function getLoisir(){
        return $this->loisirs;
    }
    public function setLoisir($loisirs){
        $this->loisirs = $loisirs;
    }

}
