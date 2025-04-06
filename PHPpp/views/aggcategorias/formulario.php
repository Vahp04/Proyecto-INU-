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
    <h1 class="text-center">Nueva Categoria</h1>
    <form action="../../controllers/CRUDcategorias/aggdatos.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Nombre de la categoria</label>
    <input type="text" class="form-control" name="nombreC">
  </div>
  <div class="mb-3">
    <label class="form-label">Descripcion de la categoria</label>
    <input type="text" class="form-control" name="descripcionC">

  </div>
  <div class="text-center">
  <button type="submit" onclick="return confirm('¿Confirmas los datos de la nueva categoria?')" class="btn btn-primary">Enviar</button>
  <a href="../scripcatego.php" class="btn btn-dark">Regresar</a>
  </div>
  </div>
</form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</dicv>
  </body>
</html>