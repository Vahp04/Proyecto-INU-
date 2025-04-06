<?php
include_once "../config/Conexión.php";

class Productinho extends conexion {
    private $producto_id;
    private $nombrepr;
    private $descripcionpr;
    private $preciopr;
    private $categoria_id;
    private $proveedor_id;
    private $cantidadpr;

    public function __construct() {}

    public function getProductoId() {
        return $this->producto_id;
    }

    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }

    public function getNombrepr() {
        return $this->nombrepr;
    }

    public function setNombrepr($nombrepr) {
        $this->nombrepr = $nombrepr;
    }

    public function getDescripcionpr() {
        return $this->descripcionpr;
    }

    public function setDescripcionpr($descripcionpr) {
        $this->descripcionpr = $descripcionpr;
    }

    public function getPreciopr() {
        return $this->preciopr;
    }

    public function setPreciopr($preciopr) {
        $this->preciopr = $preciopr;
    }

    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function getProveedorId() {
        return $this->proveedor_id;
    }

    public function setProveedorId($proveedor_id) {
        $this->proveedor_id = $proveedor_id;
    }

    public function getCantidadpr() {
        return $this->cantidadpr;
    }

    public function setCantidadpr($cantidadpr) {
        $this->cantidadpr = $cantidadpr;
    }

    public function create() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "INSERT INTO producto (nombrepr, descripcionpr, preciopr, categoria_id, proveedor_id, cantidadpr) VALUES (?,?,?,?,?,?)");
        $pre->bind_param("ssdiii", $this->nombrepr, $this->descripcionpr, $this->preciopr, $this->categoria_id, $this->proveedor_id, $this->cantidadpr);
        $pre->execute();
    }

    public function Actualizar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE producto SET nombrepr = ?, descripcionpr = ?, preciopr = ?, categoria_id = ?, proveedor_id = ?, cantidadpr = ? WHERE producto_id  = ?");
        $pre->bind_param("ssdiiii", $this->nombrepr, $this->descripcionpr, $this->preciopr, $this->categoria_id, $this->proveedor_id, $this->cantidadpr, $this->producto_id);
        $pre->execute();
    }
    public function Actualizarcantidad() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "UPDATE producto SET cantidadpr = ? WHERE nombrepr  = ?");
        $pre->bind_param("is",$this->cantidadpr, $this->nombrepr);
        $pre->execute();
    }

    public function Borrar() {
        $this->conectar();
        $pre = mysqli_prepare($this->con, "DELETE FROM producto WHERE producto_id = ?");
        $pre->bind_param("s", $this->producto_id);
        $pre->execute();
    }
}
/*
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
  }  */





?>