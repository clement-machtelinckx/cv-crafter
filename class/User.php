<?php
session_start();

class User {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $birthdate;

    
    public function __construct(
        int $id = null,
        string $name = "",
        string $surname = "",
        string $email = "",
        string $birthdate = ""
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->birthdate = $birthdate;

    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function setSurname($surname){
        $this->surname = $surname;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getBirthdate(){
        return $this->birthdate;
    }
    public function setBirthdate($birthdate){
        $this->birthdate = $birthdate;
    }

    public function inscripUser($name, $surname, $email, $password, $birthdate){

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


        if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["birthdate"]) && isset($_POST["password"]) && isset($_POST["confirme_password"])){
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $birthdate = $_POST["birthdate"];
            $password = $_POST["password"];
            $hash_password = sha1($password);
            $confirme_password = $_POST["confirme_password"];
            
            if ($_POST["password"] === $_POST["confirme_password"]){
                
                $sql = "INSERT INTO user (name, surname, email, birthdate, password)
                VALUES (:name, :surname, :email, :birthdate, :password)";
                
                try {
                    $sth = $conn->prepare($sql);
                    $sth->bindParam(':name', $name, PDO::PARAM_STR);
                    $sth->bindParam(':surname', $surname, PDO::PARAM_STR);
                    $sth->bindParam(':email', $email, PDO::PARAM_STR);
                    $sth->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
                    $sth->bindParam(':password', $hash_password, PDO::PARAM_STR);
                
                    $sth->execute();
                    echo "Données insérées avec succès.";
                } catch(PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            }
        }

    }

    public function connecUser($email, $password){

        
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

        if (isset($_POST["email"]) && $_POST["password"]){
            $email = $_POST["email"];
            $password = $_POST["password"];
            $hash_password = sha1($password);

            $sql = "SELECT * FROM user WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                if ($hash_password === $user["password"]){
                    $_SESSION['username'] = $user['email'];

                    //header("location: profil.php");
                    echo "connected";
                    var_dump($_SESSION);
                }
                else{
                    echo "incorect password";
                }
            }
            else{
                echo "User not found";
            }
        }
    }

    public function profileModif($name, $surname, $email, $password, $birthdate){
        
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

        if (isset($_SESSION['username']) && isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["email"]) && isset($_POST["birthdate"]) && isset($_POST["password"]) && isset($_POST["confirme_password"])){
            $name = $_POST["name"];
            $surname = $_POST["surname"];
            $email = $_POST["email"];
            $birthdate = $_POST["birthdate"];
            $password = $_POST["password"];
            $confirme_password = $_POST["confirme_password"];

            if ($_POST["password"] === $_POST["confirme_password"]){

                $hash_password = sha1($_POST["password"]);

                $sql = "UPDATE user SET name = :name, surname = :surname, email = :email, birthdate = :birthdate, password = :password WHERE email = :user_email";

                try {
                    $sth = $conn->prepare($sql);
                    $sth->bindParam(':name', $name, PDO::PARAM_STR);
                    $sth->bindParam(':surname', $surname, PDO::PARAM_STR);
                    $sth->bindParam(':email', $email, PDO::PARAM_STR);
                    $sth->bindParam(':birthdate', $birthdate, PDO::PARAM_STR);
                    $sth->bindParam(':password', $hash_password, PDO::PARAM_STR);
                    $sth->bindParam(':user_email', $_SESSION['username'], PDO::PARAM_STR);

                    $sth->execute();
                    echo "Données insérées avec succès.";
                } catch(PDOException $e) {
                    echo "Erreur : " . $e->getMessage();
                }
            }
        }
    }

    public function getUserInfos($email){
        if (isset($_SESSION["username"])){
           
            $email = $_SESSION["username"];
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

        
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        }
        if ($user){
            $this->name = $user["name"];
            $this->surname = $user["surname"];
            $this->email = $user["email"];
            $this->birthdate = $user["birthdate"];
            return $user;

        }
    }
}