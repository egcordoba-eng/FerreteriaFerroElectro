<?php
session_start();
require_once '../app/controllers/usuariosController.php';

// Definir qué controlador se va a ejecutar
$controller=$_GET['controller'] ?? 'usuarios';
$action=$_GET['action'] ?? 'index';
$id=$_GET['id'] ?? null;
// Convertir primera letra en mayúscula y armar nombre del controlador
$controllerName = ucfirst($controller) . 'Controller';
//die($controllerName);
// Verificar si el controlador existe
if(class_exists($controllerName)){
    $objController = new $controllerName();
    // Verificar si la acción existe
    if(method_exists($objController, $action)){
        if($id==null){
            $objController->$action();
        }else{
            $objController->$action($id);
        }
    }else{
        echo "Acción '{$action}' no encontrada en el controlador '{$controllerName}'";
    }
}else{
    echo "Controlador '{$controllerName}' no encontrado.";
}

// Renderizamos la plantilla principal
//include "../app/views/layouts/main.php";
?>