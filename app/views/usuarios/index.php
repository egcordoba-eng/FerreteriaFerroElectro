<?php 
// Incluimos las secciones comunes de la plantilla
//include_once __DIR__ . "/../layouts/barraSuperior.php";
//include_once __DIR__ . "/../layouts/menuLateral.php";
//include_once __DIR__ . "/../layouts/main.php"; 
?>

<!-- Contenido principal -->
<div class="content-wrapper">
  <!-- Encabezado de la página -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Gestión de Usuarios</h1>
        </div>
        <div class="col-sm-6 text-right">
          <a href="index.php?controller=usuarios&action=crear" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Nuevo Usuario
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Contenido -->
  <section class="content">
    <div class="container-fluid">

      <!-- Mensajes de exito o error al actualizar -->
      <?php if (isset($_SESSION['mensaje'])): ?>
          <div class="alert alert-<?php echo $_SESSION['tipo_mensaje']; ?> alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['mensaje']; ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']); ?>
      <?php endif; ?>
      <!-- final mensaje -->

      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h3 class="card-title"><i class="fas fa-users"></i> Lista de Usuarios</h3>
        </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Constraseña</th>
                <th>Email</th>
                <th>Fecha de creacion</th>
                <th>Rol</th>
                <th>Estado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              // Aquí se consumiría el controlador para obtener los usuarios
              // Ejemplo de datos de prueba (luego esto lo sacas de la BD)
              if(!empty($data)):
                foreach ($data as $row):?>
                  <tr>
                    <td><?= $row['id_usuario'] ?></td>
                    <td><?= $row['nombre_usuario'] ?></td>
                    <td><?= $row['contrasena'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['fecha_creacion'] ?></td>
                    <td><?= $row['rol'] ?></td>
                    <td>
                      <?php if($row['estado']=="1"): ?>
                        <span class="badge badge-success">Activo</span>
                      <?php else: ?>
                        <span class="badge badge-danger">Inactivo</span>
                      <?php endif; ?>
                    </td>
                    <td>
                      <a href="index.php?controller=usuarios&action=editar&id=<?= $row['id_usuario'] ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="index.php?controller=usuarios&action=eliminar&id=<?= $row['id_usuario'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan=8>No hay datos para mostrar</td>  
                </tr>
              <?php endif; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php //include_once __DIR__ . "/../layouts/footer.php"; ?>
