
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<?php
$id = $_REQUEST['id'];
require_once('conexion.php');
$consulta = "DELETE FROM `medicamentos` WHERE `idmedicamento`=:id";
$sql = $bdd->prepare($consulta);
$sql->bindParam(':id', $id, PDO::PARAM_INT);
$sql->execute();
if ($sql->rowCount() > 0) {
    $count = $sql->rowCount();
    echo "<div class='container m-5' > 
<h2>$count registro ha sido eliminado</h2>
<a href='crud.php'>
<button 
class='btn btn-danger' >
Regresar
</button></a>
</div>";
} else {
    echo "<div class='container m-5 alert alert-danger'> No se pudo eliminar el registro  <br>
    <a href='crud.php'>
<button 
class='btn btn-danger' >
Regresar
</button></a></div>
    ";
}
?>