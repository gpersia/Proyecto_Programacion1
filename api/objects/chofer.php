<?php
  class Chofer{
    private $conn;
    private $table_name = "chofer";
    public $id;
    public $apellido;
    public $nombre;
    public $dni;
    public $email;
    public $FK_vehiculo;
    public $FK_transporte;
    public $created;
    public $updated;
    public function __construct($db){
        $this->conn = $db;
  }

  function create(){
    $query="INSERT INTO " . $this->table_name . " SET apellido=:apellido, nombre=:nombre, dni=:dni, email=:email, FK_vehiculo=:FK_vehiculo, FK_transporte:FK_transporte, created=:created";
    $stmt = $this->conn->prepare($query);
      $this->apellido=strip_tags($this->apellido);
      $this->nombre=strip_tags($this->nombre);
      $this->dni=strip_tags($this->dni);
      $this->email=strip_tags($this->email);
      $this->FK_vehiculo=strip_tags($this->FK_vehiculo);
      $this->FK_transporte=strip_tags($this->FK_transporte);
      $this->created=strip_tags($this->created);
      echo $this->nombre;
    $stmt->bindParam(":apellido", $this->apellido);
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":dni", $this->dni);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":FK_vehiculo", $this->FK_vehiculo);
    $stmt->bindParam(":FK_transporte", $this->FK_transporte);
    $stmt->bindParam(":created", $this->created);
      
    if($stmt->execute()){
      echo json_encode(array("message"=>"verdadero"));
      //return true;
    }
    //return false;
  }

  public function read(){
        $query="SELECT * FROM " . $this->table_name . " ORDER BY dni";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    return $stmt;
  }

  public function update(){
    $query="UPDATE " . $this->table_name . " SET apellido=:apellido, nombre=:nombre, dni=:dni, email=:email, FK_vehiculo=:FK_vehiculo, FK_transporte=:FK_transporte WHERE id=:id";
    $stmt=$this->conn->prepare($query);

    $this->chofer_id=strip_tags($this->chofer_id);
    $this->apellido=strip_tags($this->apellido);
    $this->nombre=strip_tags($this->nombre);
    $this->dni=strip_tags($this->dni);
    $this->email=strip_tags($this->email);
    $this->FK_vehiculo=strip_tags($this->FK_vehiculo);
    $this->FK_transporte=strip_tags($this->FK_transporte);

    $stmt->bindParam(":apellido",$this->apellido);
    $stmt->bindParam(":nombre",$this->nombre);
    $stmt->bindParam(":dni",$this->dni);
    $stmt->bindParam(":email",$this->email);
    $stmt->bindParam(":FK_vehiculo",$this->FK_vehiculo);
    $stmt->bindParam(":FK_transporte",$this->FK_transporte);
    $stmt->bindParam(":id",$this->id);
  
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  public function delete(){
    $query="DELETE FROM " . $this->table_name . " WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $this->id=strip_tags($this->id);
    $stmt->bindParam(1,$this->id);
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  public function search($key){
    $query="SELECT * FROM " . $this->table_name . " WHERE id LIKE ? OR nombre LIKE ? OR apellido LIKE ? OR dni LIKE ? ORDER BY created DESC";
    $stmt=$this->conn->prepare($query);
    $key=strip_tags($key);
    $key = "%{$key}%";
    $stmt->bindParam(1,$key);
    $stmt->bindParam(2,$key);
    $stmt->bindParam(3,$key);
    $stmt->bindParam(4,$key);
    $stmt->execute();
    return $stmt;
  }
}
?>
