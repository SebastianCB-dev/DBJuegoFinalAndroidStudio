<?php

$hostname_localhost = "127.0.0.1";
$database_localhost = "Infinity";
$username_localhost = "root";
$password_localhost = "root";
$json = array();

if(isset($_GET["username"]) && isset($_GET["password"])) {
    $username = $_GET["username"];
    $password = $_GET["password"];

    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);    
    $consulta = "select * from user where user_username = '{$username}' and user_password = '{$password}'";
    $resultado = mysqli_query($conexion,$consulta);

    if($registro = mysqli_fetch_array($resultado)){
        $json['user'][] = $registro;
    } else {
        $resultar["user_username"] = 'No existe';
        $resultar["user_password"] = 'No existe';
        $json['user'][] = $resultar; 
    }
    mysqli_close($conexion);
    echo json_encode($json);
}
else {
    $resultar["user_username"] = 'No consultado';
    $resultar["user_password"] = 'No consultado';
    $json['user'][] = $resultar;
    echo json_encode($json);
}

?>