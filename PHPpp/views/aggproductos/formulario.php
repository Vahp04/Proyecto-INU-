<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    .cuadro1{
        position:absolute;
        width: 700px;
        height: 750px;
        background-color:#b5c3e4;
        box-shadow: 1px 5px 40px black;
    }
    .cuadro2{
        position:absolute;
        width: 700px;
        height: 120px;
       background-color: blue;
       border-radius: 10px;
       box-shadow: 5px 2px 20px;
    }
    </style>
</head>
<body>
<img style="float: left;" src="./fondo comida.png" alt="prueba" width="25%" height="750px">
<img style="float: right;" src="./fondo comida.png" alt="prueba2" width="25%" height="750px">
<dicv class="cuadro1">

    <div class="cuadro2">
        
        <img style="float:right; width: 120px; height:120px;" src="./ImagenInicio.webp" alt="Imagén de comida">
        <br>
        <center> <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">Mini Lunchería Viva el Rincón de el sabor</h2></center>
 <br>
    <h1 class="text-center">Nuevo Producto</h1>
    <form action="../../controllers/CRUDproductos/aggdatos.php" method="POST" class="container">
        <div class="mb-3">
            <label class="form-label">Nombre del producto</label>
            <input type="text" class="form-control" name="nombreP">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Categoría del producto</label>
            <select class="form-select mb-3" name="categoriaP">
                <option selected disabled>Selecciona la categoría</option>
                <?php
                include("../../config/conexion.php");
                $db = $conn->query("SELECT * FROM categoria");
                while($resultado = $db->fetch_assoc()) {
                    echo "<option value='" . $resultado['categoria_id'] . "'>" . $resultado['nombrecat'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio del producto</label>
            <input type="text" class="form-control" name="precioP">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción del producto</label>
            <input type="text" class="form-control" name="descripcionP">
        </div>

        <div class="mb-3">
            <label class="form-label">Proveedor del producto</label>
            <select class="form-select mb-3" name="proveedorP">
                <option selected disabled>Selecciona el proveedor</option>
                <?php
                include("../../config/conexion.php");
                $db = $conn->query("SELECT * FROM proveedores");
                while($resultado = $db->fetch_assoc()) {
                    echo "<option value='" . $resultado['proveedor_id'] . "'>" . $resultado['nombre_prove'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cantidad de unidades del producto</label>
            <input type="text" class="form-control" name="cantidadP">
        </div>

        <div class="text-center">
            <button type="submit" onclick="return confirm('¿Confirmas los datos del nuevo producto?')" class="btn btn-primary">Enviar</button>
            <a href="../scriproduc.php" class="btn btn-dark">Regresar</a>
        </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</dicv>
</body>
</html>