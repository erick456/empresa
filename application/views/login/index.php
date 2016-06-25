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



                    <div class="wrap">


  <div class="single-widget-container">
            <section class="widget login-widget">
                <header class="text-align-center">
                    <h4>Ingrese con su Cuenta</h4>
                </header>
                <div class="body">
                    <form name='login' class="no-margin"
                          action="http://demo.flatlogic.com/3.3.1/white/index.html" method="get">
                        <fieldset>
                            <div class="form-group">
                                <label for="email" >Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input name="usuario" id="usuario" type="text" class="form-control input-lg"
                                           placeholder="Usuario">
                                    <div id="msg_login"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  for="password" >Contraseña</label>

                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input name="contraseña" id="contrasena" type="password" class="form-control input-lg"
                                           placeholder="Contraseña">
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-actions">
                            <button onclick="ingresar()" type="button" class="btn btn-block btn-lg btn-danger">
                                <span class="small-circle"><i class="fa fa-caret-right"></i></span>
                                <small>Ingresar</small>
                            </button>
                            <a class="forgot" href="#">¿Olvidaste tu contraseña?</a>
                        </div>
                    </form>
                </div>

            </section>
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
    <?php include('public/app/Login.php'); ?>

</body>

<!-- Mirrored from demo.flatlogic.com/3.3.1/white/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jun 2016 21:45:59 GMT -->
</html>