<?php
  class Chofer{
    private $conn;
    private $table_name = "chofer";
    public $chofer_id;
    public $apellido;
    public $nombre;
    public $documento;
    public $email;
    public $vehiculo_id;
    public $sistema_id;
    public $created;
    public $updated;
    public $tipo_transporte_id;
    public function __construct($db){
        $this->conn = $db;
  }

  function create(){
    $query="INSERT INTO " . $this->table_name . " SET apellido=:apellido, nombre=:nombre, documento=:documento, email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id, created=:created, tipo_transporte_id=:tipo_transporte_id";
    $stmt = $this->conn->prepare($query);
      $this->apellido=strip_tags($this->apellido);
      $this->nombre=strip_tags($this->nombre);
      $this->documento=strip_tags($this->documento);
      $this->email=strip_tags($this->email);
      $this->vehiculo_id=strip_tags($this->vehiculo_id);
      $this->sistema_id=strip_tags($this->sistema_id);
      $this->created=strip_tags($this->created);
      
    $stmt->bindParam(":apellido", $this->apellido);
    $stmt->bindParam(":nombre", $this->nombre);
    $stmt->bindParam(":documento", $this->documento);
    $stmt->bindParam(":email", $this->email);
    $stmt->bindParam(":vehiculo_id", $this->vehiculo_id);
    $stmt->bindParam(":sistema_id", $this->sistema_id);
    $stmt->bindParam(":created", $this->created);
      
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  function read(){
    $query = "SELECT v.modelo as modelo_vehiculo, c.apellido, c.nombre, c.documento,
     c.email, c.vehiculo_id, c.sistema_id, c.created, c.updated
      FROM " . $this->table_name . " c LEFT JOIN vehiculo v ON c.vehiculo_id = v.vehiculo_id
       ORDER BY c.documento";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }

  function update(){
    $query="UPDATE " . $this->table_name . " SET apellido=:apellido, nombre=:nombre, documento=:documento, email=:email, vehiculo_id=:vehiculo_id, sistema_id=:sistema_id WHERE chofer_id=:chofer_id";
    $stmt=$this->conn->prepare($query);

    $this->chofer_id=strip_tags($this->chofer_id);
    $this->apellido=strip_tags($this->apellido);
    $this->nombre=strip_tags($this->nombre);
    $this->documento=strip_tags($this->documento);
    $this->email=strip_tags($this->email);
    $this->vehiculo_id=strip_tags($this->vehiculo_id);
    $this->sistema_id=strip_tags($this->sistema_id);

    $stmt->bindParam(":apellido",$this->apellido);
    $stmt->bindParam(":nombre",$this->nombre);
    $stmt->bindParam(":documento",$this->documento);
    $stmt->bindParam(":email",$this->email);
    $stmt->bindParam(":vehiculo_id",$this->vehiculo_id);
    $stmt->bindParam(":sistema_id",$this->sistema_id);
    $stmt->bindParam(":chofer_id",$this->chofer_id);
  
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  /*function delete(){
    $query="DELETE FROM " . $this->table_name . " WHERE chofer_id = ...";
    $stmt=$this->conn->prepare($query);
    $this->chofer_id=strip_tags($this->chofer_id);
    $stmt->bindParam(1,$this->chofer_id);
    if($stmt->execute()){
      return true;
    }
    return false;
  }

  function search($key){
    $query="SELECT * FROM " . $this->table_name . " WHERE chofer_id LIKE ... OR nombre LIKE ... OR apellido LIKE ... OR documento LIKE ... ORDER BY created DESC";
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


NO SE QUE PONER ADONDE ESTAN LOS ... PARA QUE FUNCIONE*/
?>
