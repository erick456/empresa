<!-- light-blue - v3.3.0 - 2016-03-08 -->

<!DOCTYPE html>
<html>

<!-- Mirrored from demo.flatlogic.com/3.3.1/white/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2016 21:44:18 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <title>Light Blue - Responsive Admin Dashboard Template</title>


    <link rel="shortcut icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">

    <?php include("public/includes/css.php"); ?>
    <script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
           chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
                      https://code.google.com/p/chromium/issues/detail?id=332189
                      */
                      // </script>
                  </head>
                  <body>
                    <div class="logo">
                        <h4><a href="index.html">Light <strong>Blue</strong></a></h4>
                    </div>
                    <?php include('public/includes/menu.php') ?>

                    <div class="wrap">
                     <?php include('public/includes/header.php') ?>

                     <div class="content container">
                      <section class="widget">
                        <header>
                            <h4>Productos <span class="fw-semi-bold"></span></h4>
                            <div class="widget-controls">
                                <a data-widgster="expand" title="Expand" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                <a data-widgster="collapse" title="Collapse" href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                                <a data-widgster="close" title="Close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </header>
                        <div class="body">
                            <p>

                                <a href="http://www.datatables.net/" target="_blank"></a>
                            </p>
                            <div class="mt">
                                <button  id='btnnuevo' onclick="traer_modal()" type="button" class="btn btn-success"
                                data-placement="top" data-original-title=".btn .btn-success">
                                Nuevo Producto
                            </button>
                            <table id="datatable-table" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th class="no-sort hidden-xs">Descripcion</th>
                                        <th class="hidden-xs">Precio</th>
                                        <th class="hidden-xs">Stock</th>
                                        <th class="hidden-xs">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="informacion">
                                    <?php

                                    foreach ($productos as $key => $value) {
                                        echo '<tr>';
                                        echo '  <td>'.$value->id.'</td>';
                                        echo '  <td>'.$value->producto.'</td>';
                                        echo '  <td>'.$value->descripcion.'</td>';
                                        echo '  <td>'.$value->precio.'</td>';
                                        echo '  <td>'.$value->numeroexistente.'</td>';
                                        echo '<td><button onclick="modificar_producto('.$value->id.')" type="button" class="btn btn-primary"
                                        data-placement="top" data-original-title=".btn .btn-primary">
                                        Modificar
                                    </button>
                                </td>';
                                echo '<td> <button onclick ="eliminar_producto('.$value->id.')" type="button" class="btn btn-danger"
                                data-placement="top" data-original-title=".btn .btn-danger">
                                Eliminar
                            </button>
                        </td>';
                        echo '</tr>';

                    }
                    ?>

                </tbody>
            </table>
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title" id="myModalLabel">Nuevo Producto</h4>
                        </div>
                        <div class="modal-body">
                            <form name='producto_insert' class="form-horizontal" role="form">
                                <legend class="section">Insertar Producto</legend>
                                    <div class="form-group">
                                        <input type="hidden" name="id">
                                        <label for="normal-field" class="col-sm-4 control-label">Producto</label>
                                        <div class="col-sm-7">
                                            <input  name='producto' type="text" id="normal-field" class="form-control" placeholder="Poner el producto">
                                            <div id="msg_producto"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hint-field" class="col-sm-4 control-label">
                                            Descripcion
                                        </label>
                                        <div class="col-sm-7">
                                            <input name="descripcion" type="text" id="hint-field" class="form-control" placeholder="Nombre del producto">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="tooltip-enabled">Precio</label>
                                        <div class="col-sm-7">
                                            <input name="precio" type="text" id="tooltip-enabled" class="form-control"
                                            data-placement="top" data-original-title="Some explanation text here"
                                            placeholder="Precio">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="max-length">Numero Existente</label>
                                        <div class="col-sm-7">
                                            <input  name="numeroexistente" type="text" id="max-length" maxlength="100"
                                            class="form-control"
                                            placeholder="sdfgh"
                                            data-placement="top" data-original-title="You cannot write more than 3 characters.">
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button onclick="guardar_producto()" type="button" class="btn btn-primary">Guardar</button>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
    </div>
</section>

</div>
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin"></i>
</div>
</div>
<!-- common libraries. required for every page-->
<?php include('public/includes/js.php'); ?>
<?php include('public/app/producto.php'); ?>

</body>

<!-- Mirrored from demo.flatlogic.com/3.3.1/white/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2016 21:45:59 GMT -->
</html>