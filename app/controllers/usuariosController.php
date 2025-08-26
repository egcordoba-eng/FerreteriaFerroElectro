<?php
class UsuariosController{
    private $db;
    private $usuariosModel;

    public function __construct(){
        require_once '../config/database.php';
        require_once '../app/models/usuariosModel.php';
        $database=new Database();
        $this->db=$database->connect();
        $this->usuariosModel=new UsuariosModel($this->db);
    }

    public function index(){
        $data=$this->usuariosModel->getUsuarios();
        $vista='../app/views/usuarios/index.php';
        include_once '../app/views/layouts/main.php';
    }

    public function crear(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->usuariosModel->nombre_usuario=$_POST['nombre_usuario'];
            $this->usuariosModel->contrasena=$_POST['contrasena'];
            $this->usuariosModel->email=$_POST['email'];
            $this->usuariosModel->fecha_creacion=$_POST['fecha_creacion'];
            $this->usuariosModel->rol=$_POST['rol'];

            $this->usuariosModel->crearUsuarios();
            header("Location: index.php?controller=usuarios&action=index");
        }
        $vista='../app/views/usuarios/crear.php';
        include_once '../app/views/layouts/main.php';
    }

    public function editar($id){
        $usuario=$this->usuariosModel->obtenerUsuarioId($id);
        $vista='../app/views/usuarios/editar.php';
        include_once '../app/views/layouts/main.php';
    }

    public function actualizar(){
        $this->usuariosModel->id_usuario=$_POST['id_usuario'];
        $this->usuariosModel->nombre_usuario=$_POST['nombre_usuario'];
        $this->usuariosModel->contrasena=$_POST['contrasena'];
        $this->usuariosModel->email=$_POST['email'];
        //$this->usuariosModel->fecha_creacion=$_POST['fecha_creacion'];
        $this->usuariosModel->rol=$_POST['rol'];
        $this->usuariosModel->estado=$_POST['estado'];

        $resultado=$this->usuariosModel->actualizarUsuarios();
        
        if ($resultado) {
            $_SESSION['mensaje'] = "Usuario actualizado correctamente.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al actualizar el usuario.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: index.php?controller=usuarios&action=index");
        
        //$vista='../app/views/usuarios/index.php';
        //include_once '../app/views/layouts/main.php';
    }

    public function eliminar($id){
        $resultado=$this->usuariosModel->eliminarUsuario($id);
        if ($resultado) {
            $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
            $_SESSION['tipo_mensaje'] = "success";
        } else {
            $_SESSION['mensaje'] = "Error al eliminar el usuario.";
            $_SESSION['tipo_mensaje'] = "danger";
        }

        header("Location: index.php?controller=usuarios&action=index");
    }
}
?>