<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<div class="container m-5">

    <?php
    require_once('conexion.php');
    $id = $_REQUEST['id'];
    $comand = $bdd->prepare("SELECT * FROM `medicamentos` WHERE `idmedicamento` = '$id' ");
    $comand->execute();
    $result = $comand->fetch();
    echo "
    <h1> Medicamento: <strong> $result[1]<strong></h1>
    <div id='main-wrapper'>
        <div class='container'>
        <div id='encabezado'>
        <div class='row'>

        <div class='col-md-4'>
        <form action='update.php' method='post'>
        <input type='hidden' name='id' value='$id'>
        <strong>Nombre  </strong><br/><input name='nombre' value='$result[1]' required type='text'><br/>
        <strong>Stock  </strong><br/><input class='text-right' name='stock' required  min='0' value='$result[2]' type='number'><br/>
        <strong>Descripcion  </strong><br/><textarea name='descripcion'required >$result[3] </textarea><br>
    
        <strong>Venta Libre:  </strong><br/>".ventaLibre($result[4])."<br><br>
        <input type='submit' value='Modificar' class='btn btn-warning'>
        </form>
        </div>
        </div>

        <a href='eliminar.php?id=".$id."'>
        <button 
        class='btn btn-danger' >
        Borrar
      </button></a>
      <a href='crud.php'>
      <button 
      class='btn btn-danger' >
      Regresar
    </button></a>
    </div>";
    function ventaLibre($v)
    {
        if ($v == '1') {
            return "  <label class='radio-inline'><input type='radio' name='ventalibre' value='1' checked>Si</label>
            <label class='radio-inline'><input type='radio' name='ventalibre' value='0'>No</label>";
        } else {
            return "  <label class='radio-inline'><input type='radio' name='ventalibre' value='1'>Si</label>
            <label class='radio-inline'><input type='radio' name='ventalibre'  value='0' checked>No</label>";
        }
    }
    ?>

</div>