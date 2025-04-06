<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .cuadro1{
            position:absolute;
        width: 672px;
        height: 630px;
        background-color:#b5c3e4;
        box-shadow: 1px 5px 40px black;
        }
        .cuadro2{
        position:absolute;
        width: 672px;
        height: 120px;
       background-color: blue;
       border-radius: 10px;
       box-shadow: 5px 2px 20px;
    }
    </style>

</head>
<body>
<img style="float: left;" src="../../img/fondo comida.png" alt="prueba" width="25%" height="630px">
<img style="float: right;" src="../../img/fondo comida.png" alt="prueba2" width="25%" height="630px">
<dicv class="cuadro1">

    <div class="cuadro2">
        
        <img style="float:right; width: 120px; height:120px;" src="./ImagenInicio.webp" alt="Imagén de comida">
        <br>
        <center> <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">Mini Lunchería Viva el Rincón de el sabor</h2></center>
  <br>
    <h1 class="text-center">Editar Proveedor</h1>

    <form class="container" action="../../controllers/CRUDproveedores/editardatos.php" method="POST">
        <?php
        include_once("../../config/conexion.php");

        if (isset($_GET['Id'])) {
            $proveedor_id = $_GET['Id'];

            // Prepare the SQL statement to select the provider
            $stmt2 = $conn->prepare("SELECT * FROM proveedores WHERE proveedor_id = ?");
            $stmt2->bind_param("i", $proveedor_id);
            $stmt2->execute();
            $resultado2 = $stmt2->get_result();

            if ($row2 = $resultado2->fetch_assoc()) {
                // Close the statement
                $stmt2->close();
            } else {
                echo "<div class='alert alert-danger'>No se encontró ningún proveedor con el ID especificado.</div>";
                // Close the statement and connection
                $stmt2->close();
                $conn->close();
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'>No se especificó el ID del proveedor.</div>";
            $conn->close();
            exit();
        }

        $conn->close();
        ?>
            <input type="hidden" class="form-control mb-3" name="Proveedor_id" value="<?php echo htmlspecialchars($row2['proveedor_id'], ENT_QUOTES, 'UTF-8'); ?>">

            <div class="mb-3">
                <label class="form-label">Nombre del Proveedor</label>
                <input type="text" class="form-control" name="nombre_prove" value="<?php echo htmlspecialchars($row2['nombre_prove'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Dirección del Proveedor</label>
                <input type="text" class="form-control" name="direccion_prove" value="<?php echo htmlspecialchars($row2['direccion_prove'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Teléfono del Proveedor</label>
                <input type="text" class="form-control" name="telefono_prove" value="<?php echo htmlspecialchars($row2['telefono_prove'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" onclick="return confirm('¿Confirmas los datos a editar?')" class="btn btn-primary">Enviar</button>
                <a href="../scriproves.php" class="btn btn-dark">Regresar</a>
            </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</dicv>
</body>
</html>
