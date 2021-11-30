<?php
// http://localhost/videojuego_moviles/user_create.php?username=jscarrill02&password=123&last_access=2021-11-04%2012:12:12
$hostname_localhost = "127.0.0.1";
$database_localhost = "Infinity";
$username_localhost = "root";
$password_localhost = "root";
$json = array();

if(isset($_GET["username"]) && isset($_GET["password"]) && isset($_GET["last_access"]) ) {
    $username = $_GET["username"];
    $password = $_GET["password"];
    $last_access = $_GET["last_access"];

    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);    

    $insert = "insert into user(
        user_username,       user_password, user_last_access
    ) values (
        '{$username}',  '{$password}',      '{$last_access}'     
    )";
    
    $resultado_insert = mysqli_query($conexion,$insert);

    
    if($resultado_insert) {
        $consulta = "SELECT * FROM user ORDER BY user_id desc LIMIT 1;"; 
        $resultado = mysqli_query($conexion,$consulta);

        if($registro = mysqli_fetch_array($resultado)) {
            $json['user'][] = $registro;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
    else {
        $resulta["user_username"]='No insertado';
        $resulta["user_password"]='No insertado';
        $resulta["user_last_access"]='No insertado';
        $json['user'][] = $resulta;
        echo json_encode($json);
    }

}
else {  
    $resulta["username"]='WS no recibe';
    $resulta["password"]='WS no recibe';
    $resulta["last_access"]='WS No recibe';
    $json['user'][] = $resulta;
    echo json_encode($json);
}

?>