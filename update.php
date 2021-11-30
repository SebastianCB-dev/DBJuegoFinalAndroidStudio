<?php

$hostname_localhost = "127.0.0.1";
$database_localhost = "Infinity";
$username_localhost = "root";
$password_localhost = "root";
$json = array();

if(isset($_GET["id"]) && isset($_GET["last_access"])) {
    $id = $_GET["id"];
    $last_access = $_GET["last_access"];
    
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);        
    $consulta = "update user set user_last_access = '{$last_access}' where user_id = '{$id}'";
    $resultado = mysqli_query($conexion,$consulta);

    if($registro = mysqli_fetch_array($resultado)){
        $json['user'][] = $registro;
    } else {
        $resultar["id"] = 'No existe';
        $resultar["last_access"] = 'No existe';
        $json['user'][] = $resultar; 
    }
    mysqli_close($conexion);
    echo json_encode($json);
}
else if(isset($_GET["id"]) && isset($_GET["password"])) {
    $id = $_GET["id"];
    $password = $_GET["password"];
    
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);        
    $consulta = "update user set user_password = '{$password}' where user_id = '{$id}'";
    $resultado = mysqli_query($conexion,$consulta);

   if($resultado) {    
    $resultar["user_username"] = 'Actualizado';
    $resultar["user_password"] = 'Actualizado';
    $json['user'][] = $resultar;
   }
   else {
     $resultar["user_username"] = 'No existe';
     $resultar["user_password"] = 'No existe';
     $json['user'][] = $resultar;
   }
    echo json_encode($json);
    mysqli_close($conexion);
}
else {
    $resultar["id"] = 'No consultado';
    $resultar["last_access"] = 'No consultado';
    $json['user'][] = $resultar;
    echo json_encode($json);
}

?>