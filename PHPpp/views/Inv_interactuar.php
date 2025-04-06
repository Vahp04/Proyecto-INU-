<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
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
    .cuadro3{
      position: relative;
      float: right;
      height:120px ;
      width:120px ;
    }
        .menu-content {
            padding-top: 140px; /* Espacio para el cuadro2 */
            text-align: center;
        }
        .menu-content h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<img style="float: left;" src="../img//fondo comida.png" alt="prueba" width="25%" height="610px">
<img style="float: right;" src="../img//fondo comida.png" alt="prueba2" width="25%" height="610px">
    <dicv class="cuadro1">
        <div class="cuadro2">
            <img style="float:right; width: 120px; height:120px;" src="../img/ImagenInicio.webp" alt="Imagén de comida">
            <br>
            <center>
                <h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite; border-radius:10px">
                    Mini Lunchería Viva el Rincón de el sabor
                </h2>
            </center>
        
        
        <div class="menu-content">
            <div class="btn-group-vertical">
                <button style="border-radius: 10px;" class="btn btn-primary" onclick="window.location.href='aggInventario/scripagginv.php'">Ingresar al Inventario</button>
                <br>
                <button style="border-radius: 10px;" class="btn btn-primary" onclick="window.location.href='aggsalidas/scripagginv.php'">Retirar del inventario</button>
                <br>
                <button style="border-radius: 10px;" class="btn btn-primary" onclick="window.location.href='Caducidad/scriptcadu.php'">Verificar Caducidad</button>
                <br>
                <button style="border-radius: 10px;" class="btn btn-danger" onclick="window.location.href='menu.php'">Salir</button>
                <br>
                <form action="pdfs/pdfgeneral.php" method="POST" autocomplete="off">

    </form>
            </div>
        </div>
    </div>
</dicv>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>