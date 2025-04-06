<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agregar Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
  .cuadro1{
        position:absolute;
        width: 700px;
        height: 610px;
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
    .select-combobox {
  width: 700px; /* ancho del combobox */
  height: 30px; /* alto del combobox */
  background-color: #f0f0f0; /* color de fondo del combobox */
  border: 1px solid #ccc; /* borde del combobox */
  border-radius: 5px; /* radio de esquina del combobox */
  padding: 3px; /* espacio entre el texto y el borde del combobox */
  font-size: 16px; /* tamaño de fuente del texto del combobox */
  color: #333; /* color del texto del combobox */
  cursor: pointer; /* cursor para indicar que es un elemento interactuable */
  text-align: center; /* centrar el texto dentro del combobox */
}
.select-combobox:focus {
  border-color: #aaa; /* color del borde cuando se enfoca el combobox */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* sombra cuando se enfoca el combobox */
}
</style>
  </head>
  <body>
  <img style="float: left;" src="./fondo comida.png" alt="prueba" width="25%" height="610px">
<img style="float: right;" src="./fondo comida.png" alt="prueba2" width="25%" height="610px">
<dicv class="cuadro1">

    <div class="cuadro2">
        
        <img style="float:right; width: 120px; height:120px;" src="./ImagenInicio.webp" alt="Imagén de comida">
        <br>
        <center> <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">Mini Lunchría Viva el Rincón de el sabor</h2></center>
 <br><br><br>
    <h1 class="text-center">Verificar caducidad del Inventario</h1>
    <form action="scriptproductocaduc.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Producto a registrar</label>
    <br>
    <select name="Producto" id="Producto1" class="select-combobox">
    <?php
    require("../../config/conexion.php");
    require("../../models/Productos.php");
    $Producto = new Producto($conn);
    $resultados = $Producto->obtenerProductos();
    while ($resultado = $resultados->fetch_assoc()) { ?>

<option value="<?php echo $resultado['nombrepr'];?>"><?php echo $resultado['nombrepr'];?></option>

       
    <?php }
    ?></select>


  <div class="text-center">
  <button type="submit" onclick="return confirm('¿Confirmas el producto que deseas verificar?')" class="btn btn-primary">Enviar</button>
  <a href="../menu.php" class="btn btn-dark">Regresar</a>
  </div>
  </div>
</form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</dicv>
  </body>
</html>