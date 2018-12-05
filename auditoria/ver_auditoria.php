<html>
<head>
<title>Auditoria</title>
</head>
<body>
<table border='1'>
<?php
include_once 'auditoria.php';
include_once '../api/config/database.php';

  $database=new Database();
  $db=$database->getConnection();
  $auditoria=new Auditoria($db);
  $stmt = $auditoria->read();
  $num = $stmt->rowCount();
  if($num>0){
    $auditoria_arr=array();
    $auditoria_arr["records"]=array();   
    echo "<tr>";
    echo "<th> id</th>";
    echo "<th> username</th>";    
    echo "<th> fecha_acceso</th>";
    echo "<th> tiempo_respuesta</th>";
    echo "<th> endpoint</th>";
    echo "<th> created</th>";
    echo "</tr>";  
    while($fila=$stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";      
        foreach($fila as $fil){
          echo "<td>";
          echo $fil;
          echo $a;
          echo "</td>";
        }
        echo "</tr>";
    }
  }else{
    echo "hola";
  }
?>
</table>
<a href="../welcome.php">Volver al menu</a>
</body>
</html>