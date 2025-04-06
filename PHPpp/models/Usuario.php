<?php
include_once "../config/Conexión.php";

 class Usuarios extends conexion{
    public $id_usuarios;
    public $usuario;
    public $contrasena;

    public function create(){
      $this->conectar();
       $pre = mysqli_prepare($this->con, "INSERT INTO usuarios (id_usuarios, usuario, contrasena) VALUES (?,?,?)");
       $pre->bind_param("sss", $this->id_usuarios, $this->usuario, $this->contrasena);
       $pre->execute();
    }

    public static function OBTENERPORUSUARIO($usuario){
      $Conex = new conexion();
      $Conex->conectar();
      $pre = mysqli_prepare($Conex->con, "SELECT * FROM usuarios WHERE usuario = ?");
      $pre -> bind_param("s",$usuario);
      $pre->execute();
      $res = $pre-> get_result();

      return $res->fetch_object(Usuarios::class);        
    }
    public function Actualizar_User(){
      $this -> conectar();
      $pre = mysqli_prepare($this->con, "UPDATE usuarios SET usuario = ?, contrasena = ? WHERE id_usuarios = ?");
      $pre->bind_param("sss", $this->usuario, $this->contrasena, $this->id_usuarios);
      $pre->execute();
   }

   public function Borrar(){
      $this -> conectar();
      $pre = mysqli_prepare($this->con, "DELETE FROM usuarios WHERE usuario = ?");
      $pre -> bind_param("s",$this->usuario);
      $pre -> execute();
   }
   public static function OBTENER(){
      $Conex = new conexion();
      $Conex-> conectar();
      $pre = mysqli_prepare($Conex->con,"SELECT * FROM usuarios ");
      $pre -> execute();
      $res = $pre-> get_result();
      $clientez = [];
      while($cliente = $res-> fetch_object(Usuarios::class))
         array_push($clientez,$cliente);
      
      return $clientez;
   }
}