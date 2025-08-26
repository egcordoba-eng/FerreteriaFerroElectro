<div class="content-wrapper">
    <!-- Encabezado de la página -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Edición</h3>
                </div>
                
                <!-- Formulario -->
                <form action="index.php?controller=usuarios&action=actualizar" method="POST">
                    <div class="card-body">

                        <!-- Campo oculto con el ID -->
                        <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">

                        <!-- Nombre de Usuario -->
                        <div class="form-group">
                            <label for="nombre_usuario">Nombre de Usuario</label>
                            <input type="text" name="nombre_usuario" class="form-control" id="nombre_usuario" 
                                value="<?php echo $usuario['nombre_usuario']; ?>" required>
                        </div>
                        
                        <!-- Contraseña -->
                        <div class="form-group">
                            <label for="contrasena">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control" id="contrasena"
                                value="<?php echo $usuario['contrasena']; ?>" required>
                        </div>
                        
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" 
                                value="<?php echo $usuario['email']; ?>" required>
                        </div>
                        
                        <!-- Rol -->
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select name="rol" id="rol" class="form-control" required>
                                <option value="">Seleccione un rol</option>
                                <option value="admin" <?php echo ($usuario['rol'] == 'admin') ? 'selected' : ''; ?>>Administrador</option>
                                <option value="cajero" <?php echo ($usuario['rol'] == 'cajero') ? 'selected' : ''; ?>>Cajero</option>
                                <option value="bodega" <?php echo ($usuario['rol'] == 'bodega') ? 'selected' : ''; ?>>Bodega</option>
                            </select>
                        </div>
                        
                        <!-- Estado -->
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="1" <?php if($usuario['estado'] == 1) echo 'selected'; ?>>Activo</option>
                                <option value="0" <?php if($usuario['estado'] == 0) echo 'selected'; ?>>Inactivo</option>
                            </select>
                        </div>
                        
                    </div>
                    
                    <!-- Footer con botones -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a href="index.php?controller=usuarios&action=index" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
