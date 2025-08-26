<?php 
//include_once __DIR__ . "/../layouts/barraSuperior.php";
//include_once __DIR__ . "/../layouts/menuLateral.php";
?>

<div class="content-wrapper">
    <!-- Encabezado de la página -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Usuario</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Registro</h3>
                </div>
                
                <!-- Formulario -->
                <form action="index.php?controller=usuarios&action=crear" method="POST">
                    <div class="card-body">
                        
                        <!-- Nombre de Usuario -->
                        <div class="form-group">
                            <label for="nombre_usuario">Nombre de Usuario</label>
                            <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" placeholder="Ingrese nombre de usuario" required>
                        </div>
                        
                        <!-- Contraseña -->
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Ingrese contraseña" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese correo electrónico" required>
                        </div>
                        
                        <!-- Fecha de Creación -->
                        <div class="form-group">
                            <label for="fecha_creacion">Fecha de Creación</label>
                            <input type="date" name="fecha_creacion" class="form-control" id="fecha_creacion" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        
                        <!-- Rol -->
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-control" required>
                                <option value="">Seleccione un rol</option>
                                <option value="admin">Administrador</option>
                                <option value="cajero">Cajero</option>
                                <option value="bodega">Bodega</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    <!-- Footer con botones -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?controller=usuarios&action=index" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
