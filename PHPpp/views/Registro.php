<?php 
//include_once "Usuario.php";
require("../models/Usuario.php");
$productos1 = Usuarios::OBTENER();
$productos2 = Usuarios::OBTENER();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>

    <style>
    .cuadro1{
        position:absolute;
        width: 680px;
        height: 780px;
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
<img style="float: left;" src="../img/fondo comida.png" alt="prueba" width="25%" height="780px">
  <img style="float: right;" src="../img/fondo comida.png" alt="prueba2" width="25%" height="780px">

  <dciv class="cuadro1">
    <div class="cuadro2">
       <img style="float:right; width: 120px; height:120px;" src="../img/ImagenInicio.webp" alt="Imagén de comida">
       
   <center><h2 style="font-family:'Trebuchet MS','Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans',
    Arial, sans-serif; font-size:xx-large; position:relative; color:antiquewhite;">Mini Lunchría Viva el Rincón de el sabor</h2></center>
    <br>
    <center><h2>Registro de Usuario</h2></center>
    <br>
    <form action="../controllers/procesar_registro.php" method="post">
       <center> <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" style="background-color: green; color:antiquewhite" value="Registrar"></center>
        <br>
    </form>
    <center><form action="../index.php" method="get" style="display:inline;">
        <input type="submit" style="background-color: blue; color:antiquewhite" value="Ir al Login"></center>
    </form>
    <center><h3>Eliminar</h3>
    <form method="post">
    <select name="Usuario_dd" id="Usuario_"></center>
        <?php
    foreach($productos1 as $productos1){ ?>
    <option value="<?php echo $productos1->usuario;?>"><?php echo $productos1->usuario;?></option>

 
    <?php  }   ?> 
    <input type="submit" style="background-color: red; color:antiquewhite" name="Eliminar" value="Eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar?')">
   <br>
   <?php
       if (isset($_POST['Eliminar'])) {
        $fabricanteSeleccionado = $_POST['Usuario_dd'];
        echo $fabricanteSeleccionado;
        $productos1->OBTENERPORUSUARIO($fabricanteSeleccionado);
        var_dump($productos1);
        $productos1->Borrar();
        header("Location: Registro.php");
    }
    ?>
     </select>
    </form>
    <h3>Buscar</h3>
    <form method="post">
    <label for="usuario">Usuario:</label>
    <input type="text" id="Usuario_buscar" name="Usuario__" required><br><br>
        <input type="submit" name="btnSubmit" value="Hacer algo">
        <?php 
        if(isset($_POST['btnSubmit'])){
        $userr = $_POST['Usuario__'];
        $productos1->OBTENERPORUSUARIO($userr);
        echo $productos1->id_usuarios; echo "-";
        echo $productos1->usuario;echo "-";
        echo $productos1->contrasena;}
        ?>
    </form>
    </form>
    <h3>Editar</h3>
    <form method="post">
    <select name="Usuario_dd2" id="Usuario_2">
        <?php
    foreach($productos2 as $productos2){ ?>
    <option value="<?php echo $productos2->usuario;?>"><?php echo $productos2->usuario;?></option>

 
    <?php  }   ?> 
    <input type="submit" style="background-color:yellow; color: black" name="Editar" value="Editar este usuario">
    <br> <br>
        <label for="Usuario_edit">Usuario:</label>
        <input type="text" id="Usuario_edit" name="Usuario_edit" required><br><br>
        <label for="Contrasena_edit">Contraseña:</label>
        <input type="text" id="Contrasena_edit" name="Contrasena_edit" required><br><br>
    <br>
    
    <?php
 if(isset($_POST['Editar'])){
    $usuarioEditado = $_POST['Usuario_edit'];
    $contrasenaEditado = $_POST['Contrasena_edit'];
    $Variableee = $_POST['Usuario_dd2'];
    $productos4 = new Usuarios();
    $productos4 = Usuarios::OBTENERPORUSUARIO($Variableee);
    $productos4->usuario = $usuarioEditado;
    $productos4->contrasena = "$contrasenaEditado";
    $productos4->Actualizar_User();

    
 header("Location: Registro.php");
   }
    ?>
    </div>
  </dciv>
    </form>
</body>
</html>