<?php
class UsuariosModel{
    private $conn;
    private $table='usuarios';

    public $id_usuario;
    public $nombre_usuario;
    public $contrasena;
    public $email;
    public $fecha_creacion;
    public $rol;
    public $estado;

    public function __construct($db) {
        $this->conn=$db;
    }

    public function getUsuarios(){
        $query="SELECT * FROM {$this->table}";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crearUsuarios(){
        $query="
            INSERT INTO {$this->table} SET
                nombre_usuario=:nombre_usuario,
                contrasena=:contrasena,
                email=:email,
                fecha_creacion=:fecha_creacion,
                rol=:rol
        ";

        $stmt=$this->conn->prepare($query);

        $this->nombre_usuario=htmlspecialchars(strip_tags($this->nombre_usuario));
        $this->contrasena=htmlspecialchars(strip_tags($this->contrasena));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->fecha_creacion=htmlspecialchars(strip_tags($this->fecha_creacion));
        $this->rol=htmlspecialchars(strip_tags($this->rol));

        $stmt->bindParam(':nombre_usuario',$this->nombre_usuario);
        $stmt->bindParam(':contrasena',$this->contrasena);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':fecha_creacion',$this->fecha_creacion);
        $stmt->bindParam(':rol',$this->rol);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function obtenerUsuarioId($id){
        $query="SELECT * FROM {$this->table} WHERE id_usuario={$id}";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarUsuarios(){
        $query="
            UPDATE {$this->table} SET
                nombre_usuario=:nombre_usuario,
                contrasena=:contrasena,
                email=:email,
                rol=:rol,
                estado=:estado
            WHERE id_usuario=:id_usuario
        ";

        $stmt=$this->conn->prepare($query);

        $this->nombre_usuario=htmlspecialchars(strip_tags($this->nombre_usuario));
        $this->contrasena=htmlspecialchars(strip_tags($this->contrasena));
        $this->email=htmlspecialchars(strip_tags($this->email));
        //$this->fecha_creacion=htmlspecialchars(strip_tags($this->fecha_creacion));
        $this->rol=htmlspecialchars(strip_tags($this->rol));
        $this->estado=htmlspecialchars(strip_tags($this->estado));
        
        $stmt->bindParam(':id_usuario',$this->id_usuario);
        $stmt->bindParam(':nombre_usuario',$this->nombre_usuario);
        $stmt->bindParam(':contrasena',$this->contrasena);
        $stmt->bindParam(':email',$this->email);
        //$stmt->bindParam(':fecha_creacion',$this->fecha_creacion);
        $stmt->bindParam(':rol',$this->rol);
        $stmt->bindParam(':estado',$this->estado);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function eliminarUsuario($id){
        $query="DELETE FROM {$this->table} WHERE id_usuario={$id}";
        $stmt=$this->conn->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>