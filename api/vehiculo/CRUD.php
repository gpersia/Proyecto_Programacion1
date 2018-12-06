<?php
    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $start = $time;

    include '../validate_token.php';

    echo json_encode(array("message"=>"esto es crud"));

    if($_SERVER["REQUEST_METHOD"]=='POST'){
        include 'create.php';
        $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $nuevo=parse_url($url);
        $endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
    }

    if(($_SERVER['REQUEST_METHOD']==='GET') && (isset($_GET['jwt']))){
        include 'read.php';
        $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $nuevo=parse_url($url);
        $endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
        echo json_encode(array("message"=>"esto es read"));
    }
    if($_SERVER["REQUEST_METHOD"]=='PUT'){
        include 'update.php';
        $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $nuevo=parse_url($url);
        $endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
}
    if($_SERVER["REQUEST_METHOD"]=='DELETE'){
        include 'delete.php';
            $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $nuevo=parse_url($url);
            $endpoint=$nuevo["host"].$nuevo["path"].'/'.$_SERVER['REQUEST_METHOD'];
    }

    $time = microtime();
    $time = explode(' ', $time);
    $time = $time[1] + $time[0];
    $finish = $time;
    $total_time = round(($finish - $start), 4);




echo json_encode(array("message"=>"no incluye auditoria"));

echo json_encode($name);
echo json_encode($total_time);
echo json_encode($endpoint);

    include '../auditoria/crearauditoria.php';
    echo json_encode(array("message"=>"si incluye auditoria"));


    crearauditoria($name,$total_time,$endpoint);



?>