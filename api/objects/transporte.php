<?php
class transporte{
    private $conn;
    private $table_chofer = "chofer";
    private $table_vehiculo = "vehiculo";
    private $table_transporte = "transporte";
    public $id;
    public $nombre;
    public $pais_procedencia;
    public $created;
    public $updated;
    public function __construct($conn){
        $this->conn = $conn;
    }
    
function create(){
  $query="INSERT INTO " . $this->table_transporte . " SET nombre=:nombre, pais_procedencia=:pais_procedencia, created=:created";
  $stmt = $this->conn->prepare($query);
          $this->nombre=strip_tags($this->nombre);
          $this->pais_procedencia=strip_tags($this->pais_procedencia);
          $this->created=strip_tags($this->created);
    
  $stmt->bindParam(":nombre", $this->nombre);
  $stmt->bindParam(":pais_procedencia", $this->pais_procedencia);
  $stmt->bindParam(":created", $this->created);
  if($stmt->execute()){
    return true;
  }
  return false;
    
}

function read(){
  $query = "SELECT * FROM " . $this->table_transporte . " ORDER BY created";
  $stmt = $this->conn->prepare($query);
  $stmt->execute();
  return $stmt;
}

function update(){
  $query="UPDATE " . $this->table_transporte . " SET nombre=:nombre, pais_procedencia=:pais_procedencia WHERE id=:id";
  $stmt=$this->conn->prepare($query);
        $this->id=strip_tags($this->id);
        $this->nombre=strip_tags($this->nombre);
        $this->pais_procedencia=strip_tags($this->pais_procedencia);
  $stmt->bindParam(":id",$this->id);
  $stmt->bindParam(":nombre",$this->nombre);
  $stmt->bindParam(":pais_procedencia",$this->pais_procedencia);
  if($stmt->execute()){
    return true;
  }
  return false;
  }
    
function delete(){
  $query= "DELETE FROM " . $this->table_transporte . " WHERE id=:id";
  $stmt=$this->conn->prepare($query);
  $this->id=strip_tags($this->id);
  $stmt->bindParam(":id",$this->id);
  
  if($stmt->execute() ){
    return true;
    }
    else{
      return false;
    }
  }

function search($key){
  $query="SELECT * FROM " . $this->table_transporte . " s WHERE s.id LIKE ? OR 
    s.nombre LIKE ? OR s.pais_procedencia LIKE ? ORDER BY created DESC";
  $stmt=$this->conn->prepare($query);
  $key=strip_tags($key);
  $key = "%{$key}%";
  $stmt->bindParam(1,$key);
  $stmt->bindParam(2,$key);
  $stmt->bindParam(3,$key);
  $stmt->execute();
  return $stmt;
}
}