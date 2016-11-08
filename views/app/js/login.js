function __(id){

    return document.getElementById(id);

}
function StartLogin(){

    var connect, form, response, result,user, pass, sesion;
    user = __('Username_log').value;
    pass = __('Password_log').value;
    sesion = __('chkrecordarme').checked ? "true":"false";

    form = 'user='+user+'&pass='+pass+'&sesion='+sesion;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    connect.onreadystatechange=function(){
        if (connect.readyState==4 && connect.status==200){
            if(connect.responseText == 1){
                 result = "<div class='alert alert-dismissible alert-warning'> <button type='button' class='close' data-dismiss='alert'>&times;</button> <h4>Information!</h4> <p>Estamos redireccionandote, <a href='#' class='alert-link'></a>.</p>   </div>" ;

            __('_ajax_login_').innerHTML = result;

             window.location.reload();
            }else {

               __('_ajax_login_').innerHTML = connect.responseText;

            }
        }else if (connect.readyState != 4){
          result = "<div class='alert alert-dismissible alert-warning'> <button type='button' class='close' data-dismiss='alert'>&times;</button><h4>Information!</h4> <p>Logeando..., <a href='#' class='alert-link'></a>.</p>   </div>";

            __('_ajax_login_').innerHTML = result;


        }

    }
    connect.open('POST','ajax.php?mode=login',true);
    connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    connect.send(form);


}

function ScriptLogin(e){

    if (e.keyCode == 13){

         StartLogin();
    }

}
