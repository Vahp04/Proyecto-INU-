<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Producto</title>
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
  <img style="float: left;" src="../../img/fondo comida.png" alt="prueba" width="25%" height="750px">
<img style="float: right;" src="../../img/fondo comida.png" alt="prueba2" width="25%" height="750px">
<dicv class="cuadro1">

    <div class="cuadro2">
        
        <img style="float:right; width: 120px; height:120px;" src="../../img/ImagenInicio.webp" alt="Imagén de comida">
        <br>
        <center> <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">Mini Lunchría Viva el Rincón de el sabor</h2></center>
 <br><br><br>
    <h1 class="text-center">Editar Producto</h1>

    <form class="container" action="../../controllers/CRUDproductos/editardatos.php" method="POST">
    <?php
       include_once("../../config/conexion.php");

       if (isset($_GET['Id'])) {
           $producto_id = $_GET['Id'];
           

           $stmt = $conn->prepare("SELECT * FROM producto WHERE producto_id = ?");
           $stmt->bind_param("i", $producto_id);

           $stmt->execute();


           $resultado = $stmt->get_result();


           if ($row = $resultado->fetch_assoc()) {

           } else {
               echo "No se encontró ningún producto con el ID especificado.";
           }

           // Cerrar la declaración
           $stmt->close();
       } else {
           echo "No se especificó el ID del producto.";
       }

       // Cerrar la conexión a la base de datos
       $conn->close();
    ?>

    <input type="hidden" class="form-control mb-3" name="Id" value="<?php echo $row['producto_id']; ?>">    

    <div class="mb-3">
      <label class="form-label">Nombre del producto</label>
      <input type="text" class="form-control" name="nombrePP" value="<?php echo $row['nombrepr']; ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Categoría del producto</label>
      <input type="text" class="form-control" name="categoriaPP" value="<?php echo $row['categoria_id']; ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Precio del producto</label>
      <input type="text" class="form-control" name="precioPP" value="<?php echo $row['preciopr']; ?>">
    </div>
    
    <div class="mb-3">
      <label class="form-label">Descripción del producto</label>
      <input type="text" class="form-control" name="descripcionPP" value="<?php echo $row['descripcionpr']; ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Proveedor del producto</label>
      <input type="text" class="form-control" name="proveedorPP" value="<?php echo $row['proveedor_id']; ?>">
    </div>

    <div class="mb-3">
      <label class="form-label">Cantidad de unidades del producto</label>
      <input type="text" class="form-control" name="cantidadPP" value="<?php echo $row['cantidadpr']; ?>">
    </div>

    <div class="text-center">
      <button type="submit" onclick="return confirm('¿Estás seguro de que deseas editar los datos?')" class="btn btn-primary">Enviar</button>
      <a href="../scriproduc.php" class="btn btn-dark">Regresar</a>
    </div>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</dicv>
  </body>
</html>