<?php


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];
$ventalibre = $_POST['ventalibre'];


$data = [
    'idmedicamento' => $id,
    'nombremedicamento' => $nombre,
    'stock' => $stock,
    'descripcion' => $descripcion,
    'ventalibre' => $ventalibre
];

try {
    require_once('conexion.php');
    $sql = "UPDATE medicamentos SET nombremedicamento=:nombremedicamento, stock=:stock,
            descripcion=:descripcion,ventalibre=:ventalibre WHERE idmedicamento=:idmedicamento";
    $bdd->prepare($sql)->execute($data);

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = "medicamento.php?id=$id";
    header("Location: http://$host$uri/$extra");
    exit;
} catch (\Throwable $th) {
    echo $th;
}
