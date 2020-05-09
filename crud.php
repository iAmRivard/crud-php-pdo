<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script type="text/javascript" src="assets/js/async.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 m-5">
            <h2>Agregar medicamento</h2>
            <form action="agregar.php" method="post">
                <strong>Nombre del medicamento</strong><br>
                <input type="text" class="form-control" name='nombre' placeholder="Nombre del medicamento" required><br>
                <strong>Stock</strong><br>
                <input type="number" class="form-control" name='stock' min="0" placeholder="Stock" required><br>
                <strong>Descripcion</strong><br>
                <textarea class="form-control" required name='descripcion' placeholder="Descripcion"></textarea><br>
                <strong>Venta Libre</strong>
                <label class='radio-inline'><input type='radio' name='ventalibre' value='1' checked>Si</label>
                <label class='radio-inline'><input type='radio' name='ventalibre' value='0'>No</label><br>
                <input class="btn btn-primary mb-2 ml-3" type="submit" value="Agregar">
            </form>
        </div>
        <div class="col-md-7">
            <?php
            try {
                require_once('conexion.php');
                $comand2 = $bdd->prepare("SELECT * FROM medicamentos");
                $comand2->execute();
                $cantidad = $comand2->rowCount();
                echo "<h1 class='m-5'> Medicamentos ($cantidad)</h1> ";
                $result2 = $comand2->fetchAll();
            } catch (\Throwable $th) {
                echo $th;
            }

            echo '

 			<table id="grid" class="text-center table table-striped table-bordered dt-responsive nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID MEDICAMENTO</th>
                    <th>NOMBRE</th>
                    <th>STOCK</th>
                    <th>DESCRIPCION</th>
                    <th>VENTA LIBRE</th>
                    <th>COMANDOS</th>
                </tr>
            </thead>
        <tbody>';
            for ($i = 0; $i < ($cantidad); $i++) {
                echo '
            <tr>
                <td>' . ($i + 1) . '</td>
                <td>' . $result2[$i][0] . '</td>
                <td>' . $result2[$i][1] . '</td>
                <td>' . $result2[$i][2] . '</td>
                <td>' . $result2[$i][3] . '</td>
                <td>' . ventaLibre($result2[$i][4]) . '</td>
                <td>
                <a href="eliminar.php?id=' . $result2[$i][0] . '">
                <button 
                class="btn btn-danger" >
                Borrar
              </button></a>
              <a href="medicamento.php?id=' . $result2[$i][0] . '">
                <button 
                class="btn btn-warning" >
                Editar
              </button></a>
              </td>
            </tr>';
            }

            echo "</tbody></table>";

            function ventaLibre($v)
            {
                if ($v == '1') {
                    return "Si";
                } else {
                    return "no";
                }
            }
            ?>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/showtable.js"></script>