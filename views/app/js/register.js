function __(id){
return document.getElementById(id);

}

function StartReg(){
    var connect, user,pass,email,confirm_pass,form,tyc;
    user = __('inputUsuario').value;
    pass =__('inputContraseña').value;
    confirm_pass = __('inputRepitaContraseña').value;
    email = __('inputEmail').value;
    tyc = __('tyc').checked ? true : false;

    if (tyc == true) {
      if (user != '' && pass !='' && email !='' && confirm_pass !='') {
        if (pass == confirm_pass) {
            form = 'user='+user+'&pass='+pass+'&email='+email+'&confirm_pass='+confirm_pass;
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
            connect.onreadystatechange = function(){
                if (connect.readyState == 4 && connect.status == 200) {
                  if (connect.responseText == 1) {
                    result = "<div class='alert alert-dismissible alert-success'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>Estamos redireccionandote (: )<a href='#' class='alert-link'></a>.</p>   </div>";

                     __('_ajax_register_').innerHTML = result;
                     window.location.reload();
                  }else {

                      __('_ajax_register_').innerHTML = connect.responseText;
                  }

                }else if(connect.readyState !=4){
                  result = "<div class='alert alert-dismissible alert-info'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>Estamos validando tus datos (: )<a href='#' class='alert-link'></a>.</p>   </div>";

                 __('_ajax_register_').innerHTML = result;
                }

            }
            connect.open('POST','ajax.php?mode=reg',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        }else{
          result = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>Las contraseñas no coinciden<a href='#' class='alert-link'></a>.</p>   </div>";

            __('_ajax_register_').innerHTML = result;
        }
      }else{
        result = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>Llene sus datos<a href='#' class='alert-link'></a>.</p>   </div>";

          __('_ajax_register_').innerHTML = result;

      }
    }else{
      result = "<div class='alert alert-dismissible alert-danger'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>Acepte los terminos y condiciones<a href='#' class='alert-link'></a>.</p>   </div>";

        __('_ajax_register_').innerHTML = result;

    }


}
function ScriptRegister(e){

    if (e.keyCode == 13){

         StartReg();
    }

}
