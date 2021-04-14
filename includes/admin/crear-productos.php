<?php
/* AGregado los tempaltes de la plantilla */
  include_once "functions/sesiones.php";
  include_once "functions/funciones.php";
  include_once "templates/header.php";
  include_once "templates/barra.php";
  include_once "templates/navegacionLateral.php"; 

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Productos de black wolf
      <small>llena el formulario para crear el producto</small>
    </h1>
  </section>

  <div class="row">
    <div class="col-md-8">
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Guardar Productos</h3>
          </div>
          <div class="box-body">
            <!-- form start -->
            <form role="form" name="guardar-producto" id="guardar-producto-archivo" method="post" action="modelo-productos.php" enctype="multipart/form-data">
              <div class="box-body">
                <!--<div class="form-group">
                  <label for="foto">URL de la foto</label>
                  <input autocomplete="off" type="text" class="form-control" id="foto" name="foto"
                    placeholder="Ingresa la url de la foto, ejemplo: foto.png">
                </div>-->
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input autocomplete="off" type="text" class="form-control" id="nombre" name="nombre"
                    placeholder="Ingresa el nombre del producto" >
                </div>
                <div class="form-group">
                  <label for="precio">Precio</label>
                  <input autocomplete="off" type="text" class="form-control" id="precio" name="precio"
                    placeholder="Ingresa el precio del producto" >
                </div>
                <!-- select -->
                <div class="form-group">
                <label for="precio">Categoría</label>
                  <select name="categoria" class="form-control">
                  <option value="">Selecciona una categoría</option>
                    <option value="anillos">1.- Anillos</option>
                    <option value="brasaletes">2.- Brasaletes</option>
                    <option value="collares">3.- Collares</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="imagen-producto">Foto</label>
                  <input type="file" id="imagen-producto" name="archivo_imagen">
                  <p class="help-block">Agrega una imagen del producto</p>
                </div>
                <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php
/* AGregado los tempaltes de la plantilla */
  include_once "templates/footer.php";

?>