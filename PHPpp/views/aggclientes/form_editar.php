<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoria</title>
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
        
        <img style="float:right; width: 120px; height:120px;" src="../../img/ImagenInicio.webp" alt="Imagén de comida">
        <br>
        <center> <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">Mini Lunchría Viva el Rincón de el sabor</h2></center>
  <br>
    <h1 class="text-center">Editar Usuario</h1>

    <form class="container" action="../../controllers/CRUDclientes/editardatos.php" method="POST">
        <?php
        include_once("../../config/conexion.php");

        if (isset($_GET['Id'])) {
            $id = $_GET['Id'];

            // Preparar el statement SQL para seleccionar la categoría
            $stmt2 = $conn->prepare("SELECT * FROM clientes WHERE cliente_id = ?");
            $stmt2->bind_param("i", $id);
            $stmt2->execute();
            $resultado2 = $stmt2->get_result();

            if ($row2 = $resultado2->fetch_assoc()) {
                // Cerrar el statement
                $stmt2->close();
            } else {
                echo "<div class='alert alert-danger'>No se encontró ninguna categoría con el ID especificado.</div>";
                // Cerrar el statement y la conexión
                $stmt2->close();
                $conn->close();
                exit();
            }
        } else {
            echo "<div class='alert alert-danger'>No se especificó el ID de la categoría.</div>";
            $conn->close();
            exit();
        }

        $conn->close();
        ?>
            <input type="hidden" class="form-control mb-3" name="idC" value="<?php echo htmlspecialchars($row2['cliente_id'], ENT_QUOTES, 'UTF-8'); ?>">

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo htmlspecialchars($row2['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Cedula</label>
                <input type="text" class="form-control" name="cedula" value="<?php echo htmlspecialchars($row2['cedula'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="<?php echo htmlspecialchars($row2['telefono'], ENT_QUOTES, 'UTF-8'); ?>" required>
            </div>

            <div class="text-center">
                <button type="submit" onclick="return confirm('¿Confirmas los datos a editar?')" class="btn btn-primary">Enviar</button>
                <a href="../scripclientes.php" class="btn btn-dark">Regresar</a>
            </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</dicv>
</body>
</html>
