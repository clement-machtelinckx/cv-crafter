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
        return $this->formations;
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

    public function addExperience($id_cv, $exp_title, $date_start, $date_end, $exp_explanation){
       
        $servername = "localhost";
        $username = "root";
        $password = "Clement2203$";
        $dbname = "cv-crafter";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie<br>";
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        $sql = "INSERT INTO experience (id_cv, exp_title, date_start, date_end, exp_explanation)
        VALUES (:id_cv, :exp_title, :date_start, :date_end, :exp_explanation)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_cv', $id_cv, PDO::PARAM_STR);
            $stmt->bindParam(':exp_title', $exp_title, PDO::PARAM_STR);
            $stmt->bindParam(':date_start', $date_start, PDO::PARAM_STR);
            $stmt->bindParam(':date_end', $date_end, PDO::PARAM_STR);
            $stmt->bindParam(':exp_explanation', $exp_explanation, PDO::PARAM_STR);

            $stmt->execute();
            echo "Expérience ajoutée avec succès.";
            return true; // Retourne true pour indiquer le succès de l'opération.
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false; // En cas d'erreur lors de l'insertion, retourne false.
        }

    }
    public function delExperience(){
        
    }
    public function updateExperience(){

    }

    public function addFormation($id_cv, $forma_title, $date_start, $date_end, $forma_content){

        $servername = "localhost";
        $username = "root";
        $password = "Clement2203$";
        $dbname = "cv-crafter";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie<br>";
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        $sql = "INSERT INTO formation (id_cv, forma_title, date_start, date_end, forma_content)
        VALUES (:id_cv, :forma_title, :date_start, :date_end, :forma_content)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_cv', $id_cv, PDO::PARAM_STR);
            $stmt->bindParam(':forma_title', $forma_title, PDO::PARAM_STR);
            $stmt->bindParam(':date_start', $date_start, PDO::PARAM_STR);
            $stmt->bindParam(':date_end', $date_end, PDO::PARAM_STR);
            $stmt->bindParam(':forma_content', $forma_content, PDO::PARAM_STR);

            $stmt->execute();
            echo "Expérience ajoutée avec succès.";
            return true; // Retourne true pour indiquer le succès de l'opération.
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false; // En cas d'erreur lors de l'insertion, retourne false.
        }
    }

    public function delFormation(){

    }
    public function updateFormation(){

    }

    public function addLoisir($id_cv, $loisir_title, $loisir_content){

        $servername = "localhost";
        $username = "root";
        $password = "Clement2203$";
        $dbname = "cv-crafter";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connexion réussie<br>";
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        }

        $sql = "INSERT INTO loisir (id_cv, loisir_title, loisir_content)
        VALUES (:id_cv, :loisir_title, :loisir_content)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id_cv', $id_cv, PDO::PARAM_STR);
            $stmt->bindParam(':loisir_title', $loisir_title, PDO::PARAM_STR);
            $stmt->bindParam(':loisir_content', $loisir_content, PDO::PARAM_STR);

            $stmt->execute();
            echo "Expérience ajoutée avec succès.";
            return true; // Retourne true pour indiquer le succès de l'opération.
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return false; // En cas d'erreur lors de l'insertion, retourne false.
        }

    }
    public function delLoisir(){

    }
    public function updateLoisir(){
        
    }


}
