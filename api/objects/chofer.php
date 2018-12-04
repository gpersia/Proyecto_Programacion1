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
    $query = "INSERT INTO chofer (nombre, apellido, email, dni, FK_vehiculo, FK_transporte, created) VALUES (:nombre, :apellido, :email, :dni, :FK_vehiculo, :FK_transporte, :created)";
    $stmt = $this->conn->prepare($query);

      $this->nombre=strip_tags($this->nombre);
      $this->apellido=strip_tags($this->apellido);
      $this->email=strip_tags($this->email);
      $this->dni=strip_tags($this->dni);
      $this->FK_vehiculo=strip_tags($this->FK_vehiculo);
      $this->FK_transporte=strip_tags($this->FK_transporte);
      $this->created=strip_tags($this->created);

      $stmt->bindParam(":nombre", $this->nombre);
      $stmt->bindParam(":apellido", $this->apellido);
      $stmt->bindParam(":email", $this->email);
      $stmt->bindParam(":dni", $this->dni);
      $stmt->bindParam(":FK_vehiculo", $this->FK_vehiculo);
      $stmt->bindParam(":FK_transporte", $this->FK_transporte);
      $stmt->bindParam(":created", $this->created);
    if($stmt->execute()){
      return true;
    }
    return false;
}

  public function read(){
        $query="SELECT * FROM " . $this->table_name . " ORDER BY dni";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    return $stmt;
  }

  public function update(){
    $query = "UPDATE chofer SET nombre = :nombre, apellido = :apellido, email = :email, dni = :dni, FK_vehiculo = :FK_vehiculo, FK_transporte = :FK_transporte WHERE id = :id";
    $stmt=$this->conn->prepare($query);

    $this->id=strip_tags($this->id);
    $this->nombre=strip_tags($this->nombre);
    $this->apellido=strip_tags($this->apellido);
    $this->email=strip_tags($this->email);
    $this->dni=strip_tags($this->dni);
    $this->FK_vehiculo=strip_tags($this->FK_vehiculo);
    $this->FK_transporte=strip_tags($this->FK_transporte);

    $stmt->bindParam(":id",$this->id);
    $stmt->bindParam(":nombre",$this->nombre);
    $stmt->bindParam(":apellido",$this->apellido);
    $stmt->bindParam(":email",$this->email);
    $stmt->bindParam(":dni",$this->dni);
    $stmt->bindParam(":FK_vehiculo",$this->FK_vehiculo);
    $stmt->bindParam(":FK_transporte",$this->FK_transporte);
  
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  public function delete(){
    $query="DELETE FROM " . $this->table_name . " WHERE dni=:dni";
    $stmt=$this->conn->prepare($query);

    $this->dni=strip_tags($this->dni);

    $stmt->bindParam(":id",$this->dni);

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
