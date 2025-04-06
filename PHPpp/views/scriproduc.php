<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
  
  .cuadro1{
        position:absolute;
        width: 700px;
        height: 710px;
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
    .cuadro3{
      position: relative;
      float: right;
      height:120px ;
      width:120px ;
    }
    .cuadro2 img {
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }
    .titulo {
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: xx-large;
        color: antiquewhite;
        text-align: center;
        margin-top: 20px;
    }
  </style>
</head>
<body>
<img style="float: left;" src="../img//fondo comida.png" alt="prueba" width="25%" height="710px">
<img style="float: right;" src="../img//fondo comida.png" alt="prueba2" width="25%" height="710px">
  <dicv class="cuadro1">
    <div class="cuadro2">
      <div class="cuadro3">
      <img src="../img/ImagenInicio.webp" alt="Imagén de comida">
   </div>
    <h2 class="titulo">Mini Lunchería Viva el Rincón de el sabor</h2>
<br>
    <div class="container">
      <h1 class="text-center">Listado de Productos</h1>
    </div>
    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoría</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col">Proveedor(es)</th>
            <th scope="col">Cantidad de unidades</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            require("../config/conexion.php");
            require("../models/Productos.php");

            $producto = new Producto($conn);
            $resultados = $producto->obtenerProductos();

            while ($resultado = $resultados->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo $resultado['producto_id']?></td>
            <td><?php echo $resultado['nombrepr']?></td>
            <td><?php echo $resultado['nombrecat']?></td>
            <td><?php echo $resultado['preciopr']?></td>
            <td><?php echo $resultado['descripcionpr']?></td>
            <td><?php echo $resultado['nombre_prove']?></td>
            <td><?php echo $resultado['cantidadpr']?></td>
            <td>
              <a href="aggproductos/form_editar.php?Id=<?php echo $resultado['producto_id']?>" class="btn btn-primary">Editar</a>
              <a href="../controllers/CRUDproductos/eliminardatos.php?Id=<?php echo $resultado['producto_id']?>" onclick="return confirm('¿Estás seguro de que deseas eliminar el producto?')" class="btn btn-danger">Eliminar</a>
            </td>
          </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
      <div class="text-center">
        <a href="aggproductos/formulario.php" class="btn btn-success">Agregar Producto</a>
        <a href="menu.php" class="btn btn-secondary">Regresar al Menú</a>

        <form action="pdfs/pdfproductos.php" method="POST" autocomplete="off">
    <button class="btn btn-dark" type="submit">PDF de productos</button>

</form>

      </div>
    </div>
     </div>
  </dicv>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>