<?php
//if ( isset($_SESSION['app_id']) or isset($_COOKIE['mypage_log']))

if(( isset($_SESSION['app_id']) or isset($_COOKIE['mypage_log']) ))
{
//echo "header home";
echo $_SESSION['app_id'] ."<br>";
echo $_COOKIE['mypage_log']."<br>";
  //header('location: index.php?view='. md5('home').'');

}

else
{
echo md5("login"). "<br>";
echo md5("home");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script type="text/javascript" src="<?php echo PUBLIC_DIR ?>js/jQuery-2.1.4.min.js" ></script>
    <link rel="stylesheet" href="<?php echo PUBLIC_DIR?>css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo PUBLIC_DIR?>js/bootstrap.min.js" ></script>
    </head>
    <body>
     <div class="body"></div>
    <!-- Empieza Mdal -->
        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->

      <div class="modal-content col-lg-12">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro</h4>

        </div>

        <div class="modal-body">
          <div id="_ajax_register_"></div>
            <div role="form" onkeypress="ScriptRegister(event);">
 <form >

    <div class="form-group">
      <label for="inputUsuario" class="control-label">Usuario</label>
      <input type="text" class="form-control" autocomplete="off" id="inputUsuario" placeholder="Usuario">

    </div>
    <div class="form-group">
      <label for="inputEmail" class="control-label">Email</label>

        <input type="text" class="form-control" autocomplete="off" id="inputEmail" placeholder="Email">

    </div>
    <div class="form-group">
      <label for="inputContraseña" class="control-label">Contraseña</label>

        <input type="text" class="form-control" autocomplete="off" id="inputContraseña" placeholder="Repita Contraseña">

    </div>
    <div class="form-group">
      <label for="inputRepitaContraseña" class="control-label">Repita Contraseña</label>

        <input type="text" class="form-control" autocomplete="off" id="inputRepitaContraseña" placeholder="Repita Contraseña">

    </div>
    <div class="checkbox">
            <label>
              <input type="checkbox" id="tyc"> Acepto Terminos y Condiciones
            </label>
          </div>

</form>
  <!--div role="form">

         <div class="username-row row">

                <label for="username_input">
                 <svg version="1.1" class="user-icon" x="0px" y="0px"
                    viewBox="-255 347 100 100" xml:space="preserve" height="36px" width="30px">
                      <path class="user-path" d="
                      M-203.7,350.3c-6.8,0-12.4,6.2-12.4,13.8c0,4.5,2.4,8.6,5.4,11.1c0,0,2.2,1.6,1.9,3.7c-0.2,1.3-1.7,2.8-2.4,2.8c-0.7,0-6.2,0-6.2,0
                      c-6.8,0-12.3,5.6-12.3,12.3v2.9v14.6c0,0.8,0.7,1.5,1.5,1.5h10.5h1h13.1h13.1h1h10.6c0.8,0,1.5-0.7,1.5-1.5v-14.6v-2.9
                      c0-6.8-5.6-12.3-12.3-12.3c0,0-5.5,0-6.2,0c-0.8,0-2.3-1.6-2.4-2.8c-0.4-2.1,1.9-3.7,1.9-3.7c2.9-2.5,5.4-6.5,5.4-11.1
                      C-191.3,356.5-196.9,350.3-203.7,350.3L-203.7,350.3z"/>
                </svg>
               </label>
                <input type="text" name="Password_log" autocomplete="off" id="Username_log" class="username-input" placeholder="Username" />

        </div>

          <div class="password-row row">
            <label for="password_input">
            <svg version="1.1" class="password-icon" x="0px" y="0px"
            viewBox="-255 347 100 100" height="36px" width="30px">
              <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
              l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
            </svg>
            </label>
            <input type="password" name="Password_log" autocomplete="off" id="Password_log" class="password-input" class="input" placeholder="Password"></input>

          </div>


 </div-->
        </div>
          </div>
        <div class="modal-footer">
          <button type="button" onclick="StartReg(event);" class="btn btn-success" id="btn-success">Aceptar</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>



        </div>
    </div>
  </div>
  </div>
<!-- Termina Mdal -->

<div class="container">
<div id="_ajax_login_"></div>
    <div id="login" class="login">

    <div role="form" onkeypress="ScriptLogin(event);">
    <div class="login-icon-field">

    </div>


    <div class="login-form">

      <div class="username-row row">

        <label for="Username_log">
         <svg version="1.1" class="user-icon" x="0px" y="0px"
        viewBox="-255 347 100 100" xml:space="preserve" height="36px" width="30px">
          <path class="user-path" d="
          M-203.7,350.3c-6.8,0-12.4,6.2-12.4,13.8c0,4.5,2.4,8.6,5.4,11.1c0,0,2.2,1.6,1.9,3.7c-0.2,1.3-1.7,2.8-2.4,2.8c-0.7,0-6.2,0-6.2,0
          c-6.8,0-12.3,5.6-12.3,12.3v2.9v14.6c0,0.8,0.7,1.5,1.5,1.5h10.5h1h13.1h13.1h1h10.6c0.8,0,1.5-0.7,1.5-1.5v-14.6v-2.9
          c0-6.8-5.6-12.3-12.3-12.3c0,0-5.5,0-6.2,0c-0.8,0-2.3-1.6-2.4-2.8c-0.4-2.1,1.9-3.7,1.9-3.7c2.9-2.5,5.4-6.5,5.4-11.1
          C-191.3,356.5-196.9,350.3-203.7,350.3L-203.7,350.3z"/>
        </svg>
        </label>
        <input type="text" name="Password_log" autocomplete="off" id="Username_log" class="username-input" placeholder="Username" />

      </div>

      <div class="password-row row">
        <label for="Password_log">
        <svg version="1.1" class="password-icon" x="0px" y="0px"
        viewBox="-255 347 100 100" height="36px" width="30px">
          <path class="key-path" d="M-191.5,347.8c-11.9,0-21.6,9.7-21.6,21.6c0,4,1.1,7.8,3.1,11.1l-26.5,26.2l-0.9,10h10.6l3.8-5.7l6.1-1.1
          l1.6-6.7l7.1-0.3l0.6-7.2l7.2-6.6c2.8,1.3,5.8,2,9.1,2c11.9,0,21.6-9.7,21.6-21.6C-169.9,357.4-179.6,347.8-191.5,347.8z"/>
        </svg>
        </label>
        <input type="password" name="Password_log" autocomplete="off" id="Password_log" class="password-input" placeholder="Password"></input>

    </div>


  </div>

  <div class="call-to-action">
     <label for="chkrecordarme">Recordar Sesion </label>
     <input type="checkbox" name="chkrecordarme" id="chkrecordarme" >

      <input id="login-button" onclick=" StartLogin();" value="Log In" type="button"></input>
      <p>No tienes una cuenta? Que esperas. <a data-toggle="modal" data-target="#myModal">Registrate!</a></p>
    </div>
</div>
</div>

</body>

<link rel="stylesheet" href="<?php echo VIEWS_DIR; ?>app/css/login.css"/>
<script type="text/javascript" src="<?php echo VIEWS_DIR?>app/js/login.js" ></script>
<script type="text/javascript" src="<?php echo VIEWS_DIR?>app/js/register.js" ></script>
</html>
<?php
}

?>
