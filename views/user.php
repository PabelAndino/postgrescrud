<?php

//se activa el almacenamiento el Buffer para iniciar sesion
require 'header.php';
?>
<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h1 class="box-title">Usuario
                            <button class="btn btn-success" onclick="mostrarform(true)" id="btnAgregar"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <!-- centro -->
                    <div class="panel-body table-responsive" >
                        <table id="listuser" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>

                            <th>Estado</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>




                        <form action="formulario" id="formulario" method="POST">
                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Nombre</label>
                                <input type="hidden"  name="idusuario" id="idusuario">
                                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                            </div>

                            <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="100" placeholder="Nombre" required>
                            </div>
                            <!--<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <label>Tipo de documento</label>
                                <select class="form-control select-picker" name="tipo_documento" id="tipo_documento" required>
                                    <option value="CEDULA">Cedula</option>
                                    <option value="RUC">Ruc</option>
                                </select>

                            </div>
-->






                            <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-12" >
                                <button class="btn btn-primary" type="submit" id="btnSave" ><i class="fa fa-save"></i>Guardar</button>
                                <button class="btn btn-danger" onclick="cancelarform()" type="button" ><i class="fa fa-arrow-circle-left"></i>Cancelar</button>
                            </div>

                        </form>
                    </div>

                    <!--Fin centro -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<?php


require 'footer.php';
?>

<script type="text/javascript" src="scripts/user.js"></script>


