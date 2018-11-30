<?php
class Vehiculo{
    // Connection instance
    private $conn;
    // table name
    private $table_name = "vehiculo";
    private $table_chofer = "chofer";
    // table columns
    public $vehiculo_id;
    public $patente;
    public $anho_fabricacion;
    public $marca;
    public $modelo;
    public $created;
    public $updated;
    public function __construct($conn){
        $this->conn = $conn;
    }
    public function read()
    {
        $query="SELECT * FROM " . $this->table_name . " ORDER BY patente";
       // $query="SELECT patente FROM " . $this->table_name . " ";
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
        //nunca poner FROM con UPDATE
        $query="UPDATE " . $this->table_name . " SET patente=:patente, anho_patente=:anho_patente, anho_fabricacion=:anho_fabricacion,
         marca=:marca, modelo=:modelo WHERE vehiculo_id=:vehiculo_id";
         
         $stmt=$this->conn->prepare($query);
         //sacamos etiquetas
         $this->patente=strip_tags($this->patente);
         $this->anho_patente=strip_tags($this->anho_patente);
         $this->anho_fabricacion=strip_tags($this->anho_fabricacion);
         $this->marca=strip_tags($this->marca);
         $this->modelo=strip_tags($this->modelo);
         $this->vehiculo_id=strip_tags($this->vehiculo_id);
         
         //relacionamos
         $stmt->bindParam(":patente",$this->patente);
         $stmt->bindParam(":anho_patente",$this->anho_patente);
         $stmt->bindParam(":anho_fabricacion",$this->anho_fabricacion);
         $stmt->bindParam(":marca",$this->marca);
         $stmt->bindParam(":modelo",$this->modelo);
         $stmt->bindParam(":vehiculo_id",$this->vehiculo_id);
         if($stmt->execute()){
            return true;
        }
        
        return false;
        
    }
    
public function delete()
{
    $query_sistema= "DELETE FROM " . $this->table_sistema . " WHERE vehiculo_id=:vehiculo_id";
    $query="DELETE FROM " . $this->table_name . " WHERE vehiculo_id=:vehiculo_id";
    $query_chofer="DELETE FROM " . $this->table_chofer . " WHERE vehiculo_id=:vehiculo_id";
    $stmt_sistema=$this->conn->prepare($query_sistema);
    $stmt=$this->conn->prepare($query);
    $stmt_chofer=$this->conn->prepare($query_chofer);
    
    $this->vehiculo_id=strip_tags($this->vehiculo_id);
    $stmt_sistema->bindParam(":vehiculo_id",$this->vehiculo_id);
    $stmt->bindParam(":vehiculo_id",$this->vehiculo_id);
    $stmt_chofer->bindParam(":vehiculo_id",$this->vehiculo_id);
    
    if(($stmt_sistema->execute()) && ($stmt_chofer->execute()) && ($stmt->execute())){
        return true;
    }else{
        return false;
    }
    
  }
public function search($keyword)
{
    
    $query="SELECT * FROM " . $this->table_name . " WHERE vehiculo_id LIKE ? OR patente LIKE ? OR anho_patente LIKE ? OR anho_fabricacion LIKE ? 
    OR marca LIKE ? OR modelo LIKE ? ORDER BY created DESC";
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