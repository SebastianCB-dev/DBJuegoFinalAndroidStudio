<?php
// http://localhost/videojuego_moviles/user_create.php?username=jscarrill02&password=123&last_access=2021-11-04%2012:12:12
$hostname_localhost = "127.0.0.1";
$database_localhost = "Infinity";
$username_localhost = "root";
$password_localhost = "root";
$json = array();

if(isset($_GET["username"]) && isset($_GET["id"]) && isset($_GET["points"]) ) {
    $username = $_GET["username"];
    $id = $_GET["id"];
    $points = $_GET["points"];

    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);    

    $insert = "insert into score(
        score_user_username, score_user_id, points
    ) values (
        '{$username}',  '{$id}',      '{$points}'     
    )";
    
    $resultado_insert = mysqli_query($conexion,$insert);

    
    if($resultado_insert) {
        $consulta = "SELECT * FROM score ORDER BY score_user_id desc LIMIT 1;"; 
        $resultado = mysqli_query($conexion,$consulta);

        if($registro = mysqli_fetch_array($resultado)) {
            $json['user'][] = $registro;
        }
        mysqli_close($conexion);
        echo json_encode($json);
    }
    else {
        $resulta["score_user_username"]='No insertado';
        $resulta["score_user_id"]='No insertado';
        $resulta["points"]='No insertado';
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