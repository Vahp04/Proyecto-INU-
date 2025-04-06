<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="Css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    .cuadro1{
        position:absolute;
        width: 680px;
        height: 620px;
        background-color:#b5c3e4;
        box-shadow: 1px 5px 40px black;
    }
    .cuadro2{
        position:absolute;
        width: 680px;
        height: 120px;
       background-color: blue;
       border-radius: 10px;
       box-shadow: 5px 2px 20px;
    }
    </style>
    
</head>

<body>
<img style="float: left;" src="img/fondo comida.png" alt="prueba" width="25%" height="620px">
  <img style="float: right;" src="img/fondo comida.png" alt="prueba2" width="25%" height="620px">
  <dciv class="cuadro1">

    <div class="cuadro2">
        
       <img style="float:right; width: 120px; height:120px;" src="img/ImagenInicio.webp" alt="Imagén de comida">
       <br>
   <center> <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">Mini Lunchería Viva el Rincón de el sabor</h2></center>
    <div class="container">
        <br><br>
        <center><h2 style="font-family:Georgia, 'Times New Roman', Times, serif">INICIO DE SESIÓN</h2></center>
        <br>
        <form action="controllers/Validarlogin.php" method="post">
           </div> 
        <div class="mb-3">
                <center><label style="font-family:Georgia, 'Times New Roman', Times, serif" for="usuario" class="form-label">Usuario:</label></center>
                <input type="text" class="form-control" id="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <center><label style="font-family:Georgia, 'Times New Roman', Times, serif" for="contrasena" class="form-label">Contraseña:</label></center>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <center><button style="background:blue" type="submit" class="btn btn-primary">INGRESAR</button></center>
        </form>
        <br>
        <center><a style="background:gray" href="views/Vista_usuarios.php" class="btn btn-secondary">Registrate</a></center>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </dciv>
</body>
</html>