<?php

$hostname_localhost = "127.0.0.1";
$database_localhost = "Infinity";
$username_localhost = "root";
$password_localhost = "root";
$json = array();

$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);    
$consulta = "select * from score order by points desc";
$resultado = mysqli_query($conexion,$consulta);

$data_length = mysqli_num_rows($resultado);

while($row = $resultado->fetch_row()) {
    $json['score'][] = $row;
}

mysqli_close($conexion);
echo json_encode($json);



?>