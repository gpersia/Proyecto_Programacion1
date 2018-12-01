<?php
    if($_SERVER['HTTP_REFERER'] == "CRUD.php"){
      header("Access-Control-Allow-Origin: *");
      header("Content-Type: application/json; charset=UTF-8");

      include_once '../config/database.php';
      include_once '../objects/transporte.php';

      $database=new Database();
      $db=$database->getConnection();
      $transporte=new transporte($db);
      $key=isset($_GET["s"]) ? $_GET["s"] : "";
      $stmt=$transporte->search($key);
      $numero=$stmt->rowCount();

      if($num>0){
        $transporte_arr=array();
        $transporte_arr["archivos"]=array();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          $transporte_item=array(
            "id"=>$id,
            "nombre"=>$nombre,
            "pais_procedencia"=>$pais_procedencia,
            "created"=>$created,
            "updated"=>$updated
          );
        array_push($transporte_arr["archivos"],$transporte_item);
      }
      echo json_encode($transporte_arr);
      }
      else{
        echo json_encode(array("message"=>"Error, intente nuevamente"));
      }
    }
    else{
      echo json_encode(array("message" => "Sin autorizacion"));
    }
?>