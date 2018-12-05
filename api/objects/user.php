<?php
class User{

    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;

    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
    
        if($this->Existe()){
            return false;
        }
        $query = "INSERT INTO " . $this->table_name . " SET
                    username=:username,
                    password=:password";
    
        $stmt = $this->conn->prepare($query);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->password=htmlspecialchars(strip_tags($this->password));    
        $stmt->bindParam(":username", $this->username);

        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $password_hash);
    

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return true;
        }
    
        return false;

}
    // login user
    function login(){
        // select all query
        $query = "SELECT
                    `id`, `username`, `password`, `created`
                FROM
                    " . $this->table_name . " 
                WHERE
                    username='".$this->username."' AND password='".$this->password."'";
        // prepare query statement
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    function Existe(){
        $query = "SELECT *
            FROM
                " . $this->table_name . " 
            WHERE
                username='".$this->username."'";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        if($stmt->rowCount() > 0){
            return true;
        }
        else{
            return false;
        }
    }

function usernameExiste(){
 
    $query = "SELECT id, username, password
            FROM " . $this->table_name . " WHERE username ='".$this->username."'";

    $stmt = $this->conn->prepare( $query );

    $this->username=htmlspecialchars(strip_tags($this->username));

    $stmt->bindParam(":username",$this->username);
    $stmt->execute();

    $num = $stmt->rowCount();
    if($num>0){

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->username = $row['username'];
        $this->password = $row['password'];
        return true;
    }
    return false;
}
}