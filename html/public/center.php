<?php
if (!isset($_SESSION['app_id'])){
    
    echo 
        
        " 
  <div id='_ajax_login_'></div>
  <div class='card-container'>
  
    <div class='toggle'><i class='fa fa-user fa-pencil fa-lg'></i>
    
      <div class='tooltip'>Registro</div>
    </div>
    <div class='card login-register login-reset'>
      <h1 class='title'>Login</h1>
      <div role='form' onkeypress = 'return ScriptLogin(event)'>
        <div class='input-container has-feedback'>
          <input type='text' style='font-size:120%;' id='Username_log' name='Username' required autocomplete='off' pattern='[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+' title='Must contain from 3 to 30 characters such as any letter, number, an underscore, or a hyphen.' />
          <label for='Username_log'>Username</label>
          <i class='fa fa-user form-control-feedback'></i>
          <div class='check'></div>
          <div class='bar'></div>
        </div>
        <div class='input-container has-feedback'>
          <input type='password' id='Password_log' name='Password' required autocomplete='off' title='Must contain at least one number and one uppercase and lowercase letter, and from 8 to 20 characters.' />
          <label for='Password_log'>Password</label>
          <i class='fa fa-lock form-control-feedback'></i>
          <div class='check'></div>
          <div class='bar'></div>
        </div>
        <div class='checkbox'>
          <label>
                <input type='checkbox' id='Recordarme' checked>
                <span class='cr'><i class='cr-icon fa fa-rocket'></i></span>
                Remember me
            </label>
        </div>
        <div class='button-container'>
          <button class='rkmd-btn btn-lightBlue ripple-effect float-right' onclick='StartLogin()' ><span>Aceptar</span></button>
        </div>
        <div class='footer'><a href='#'>Forgot your password?</a></div>
      </div>
    </div>
    <div class='card login-register'>
      <h1 class='title'>Crear una cuenta</h1>
     <div role='form' onkeypress = 'return ScriptReg(event)'>
        <div class='input-container has-feedback'>
          <input type='text' style='font-size:120%;' id='Username_reg' name='Username' required autocomplete='off' pattern='[\w_-]{3,30}' title='El username permite solo de 3 a 30 caracteres.' />
          <label for='Username_reg'>Username</label>
          <i class='fa fa-user form-control-feedback'></i>
          <div class='check'></div>
          <div class='bar'></div>
        </div>
        <div class='input-container has-feedback'>
          <input type='email' id='E-mail_reg' name='E-mail' required pattern='[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+' title='No es un Email!' autocomplete='off' />
          <label for='E-mail_reg'>E-mail</label>
          <i class='fa fa-envelope form-control-feedback'></i>
          <div class='check'></div>
          <div class='bar'></div>
        </div>
        <div class='input-container has-feedback'>
          <input type='password' id='Password_reg' name='Password' required autocomplete='off' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}' title='El Password permite de 8 a 20 caracteres.' />
          <label for='Password_reg'>Password</label>
          <i class='fa fa-lock form-control-feedback'></i>
          <div class='check'></div>
          <div class='bar'></div>
        </div>
        <div class='checkbox'>
          <label>
                <input type='checkbox' id='terms' required>
                <span class='cr'><i class='cr-icon fa fa-rocket'></i></span>
                I accept something I never read
            </label>
        </div>
        <div class='button-container'>
          <button><span>Registrar</span></button>
        </div>
      </div>
    </div>
    <div class='card login-reset'>
      <h1 class='title'>Reset password</h1>
      <p class='reset-info'>Password reset instruction will be send to your e-mail.</p>
      <div role='form' onkeypress = 'return ScriptReset(event)'>
        <div class='input-container has-feedback'>
          <input type='email' id='E-mail_res' name='E-mail' required pattern='[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+' title='Not an e-mail!' autocomplete='off' />
          <label for='E-mail_res'>E-mail</label>
          <i class='fa fa-envelope form-control-feedback'></i>
          <div class='check'></div>
          <div class='bar'></div>
        </div>
        <div class='button-container'>
          <button><span>Reset</span></button>
        </div>
        <div class='footer'><a href='#'>Regresar al Login</a></div>
      </div>
    </div>
  </div>
";
    
}else{
    echo "<div id='slipp'>

                <div id='slider'>
                    <figure>
                        <img src='views/images/Gana_Kms_LANPASS-novedades.jpg' />
                        <img src='views/images/Lavado_de_vestidos-novedades.jpg' />
                        <img src='views/images/Lavado_en_general-novedades.jpg' />
                        <img src='views/images/Limpieza_de_cueros-novedades.jpg' />
                        
                    </figure>
                </div>
            </div>";
 
} 

?>

 

      