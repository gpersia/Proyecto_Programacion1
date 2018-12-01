<?php
class Vehiculo{
    private $conn;
    private $table_name = "vehiculo";
    private $table_chofer = "chofer";
    public $id;
    public $marca;
    public $modelo;
    public $anho_fabricacion;
    public $patente;
    public $created;
    public $updated;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function read()
    {
        $query="SELECT * FROM " . $this->table_name . " ORDER BY patente";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function create()
    {
        $query="INSERT INTO " . $this->table_name . " SET marca=:marca, modelo=:modelo, anho_fabricacion=:anho_fabricacion, patente=:patente, created=:created";
        $stmt=$this->conn->prepare($query);
        $this->marca=strip_tags($this->marca);
        $this->modelo=strip_tags($this->modelo);
        $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
        $this->patente=strip_tags($this->patente);
        $this->created=strip_tags($this->created);
        $stmt->bindParam(":marca",$this->marca);
        $stmt->bindParam(":modelo",$this->modelo);
        $stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
        $stmt->bindParam(":patente",$this->patente);
        $stmt->bindParam(":created",$this->created);
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }
    public function update()
    {
        $query="UPDATE " . $this->table_name . " SET marca=:marca, modelo=:modelo, anho_fabricacion=:anho_fabricacion, patente=:patente, created=:created WHERE id=:id";
         
        $stmt=$this->conn->prepare($query);
        $this->marca=strip_tags($this->marca);
        $this->modelo=strip_tags($this->modelo);
        $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
        $this->patente=strip_tags($this->patente);
        $this->created=strip_tags($this->created);
        $this->id=strip_tags($this->id);
        $stmt->bindParam(":marca",$this->marca);
        $stmt->bindParam(":modelo",$this->modelo);
        $stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
        $stmt->bindParam(":patente",$this->patente);
        $stmt->bindParam(":created",$this->created);
        $stmt->bindParam(":id",$this->id);
         if($stmt->execute()){
            return true;
        }
        
        return false;
        
    }
    
public function delete()
{
    $query="DELETE FROM " . $this->table_name . " WHERE id=:id";
    $query_chofer="DELETE FROM " . $this->table_chofer . " WHERE id=:id";
    $stmt=$this->conn->prepare($query);
    $stmt_chofer=$this->conn->prepare($query_chofer);
    
    $this->id=strip_tags($this->id);
    $stmt->bindParam(":id",$this->id);
    $stmt_chofer->bindParam(":id",$this->id);
    
    if(($stmt_sistema->execute()) && ($stmt_chofer->execute()) && ($stmt->execute())){
        return true;
    }else{
        return false;
    }
    
  }
public function search($keyword)
{
    
    $query="SELECT * FROM " . $this->table_name . " WHERE id LIKE ? OR marca LIKE ? OR modelo LIKE ? 
    OR anho_fabricacion LIKE ? OR patente LIKE ? ORDER BY created DESC";
    $stmt=$this->conn->prepare($query);
    $keyword=strip_tags($keyword);
    $keyword = "%{$keyword}%";
    $stmt->bindParam(1,$keyword);
    $stmt->bindParam(2,$keyword);
    $stmt->bindParam(3,$keyword);
    $stmt->bindParam(4,$keyword);
    $stmt->bindParam(5,$keyword);
    $stmt->bindParam(6,$keyword);
    $stmt->execute();
    return $stmt;
 
}
}
?>