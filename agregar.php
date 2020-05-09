<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<?php
try {
    $nombre = $_POST['nombre'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $ventalibre = $_POST['ventalibre'];
    require_once('conexion.php');
    $data = [
        'nombremedicamento' => $nombre,
        'stock' => $stock,
        'descripcion' => $descripcion,
        'ventalibre' => $ventalibre
    ];
    $comand = $bdd->prepare("INSERT INTO `medicamentos` (nombremedicamento,stock,descripcion,ventalibre) 
                             VALUES (:nombremedicamento, :stock, :descripcion,:ventalibre) ");
    $comand->execute($data);
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = "crud.php";
    header("Location: http://$host$uri/$extra");
    exit;
} catch (\Throwable $th) {
    echo "Error al agregar";
}

?>