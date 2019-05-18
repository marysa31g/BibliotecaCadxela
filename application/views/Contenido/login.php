    <!-- NIVEL MODAL -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
      <div class="modal-header">
          <center><h4 class="modal-title">Autentificacion de Usuario</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
                <div id="div-forms">
              <div id="login-form">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>

                            </div>
                            <br>
                  <form method="POST" action="">
                  <span id="text-login-msg" >Usuario.</span><span id="A"></span>
				    		<input id="login_username" oninput="validar()"  class="form-control" type="text" placeholder="correo@gmail.com" name="username" required>
                             <br>
                  <span id="text-login-msg">Contraseña.</span><span id="B"></span>
				    		<input id="login_password" oninput="validar()" class="form-control" type="password" placeholder="Contraseña" name="password" required>
                <div class="modal-footer">
                            <div>
                              <span id="C"></span>
                            <button type="submit" class="btn btn-primary" style="display:none;" id="valido" >Iniciar Sesión</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                            </div>
                    <br>
              </div>
        		    	</div>

				               </div>
                    </form>
                </div>
			</div>
		</div>
</div>
  <script type="text/javascript">
  function validar_email( email )
{
     var regex = /^([a-zA-Z])+(([a-zA-Z0-9\-\_\.]))+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}
function validar_Password( contra )
{
     var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;
     return regex.test(contra) ? true : false;
}
function validar() {
     var email_valida=document.getElementById("login_username").value;
     var contrasena_valida=document.getElementById("login_password").value;
     var email_validaA=document.getElementById("A").value;
     var contrasena_validaB=document.getElementById("B").value;
if(email_valida==""){
     login_username.style.borderColor="blue";
     document.getElementById('valido').style.display='none';
}else{
  if(contrasena_valida==""){
    document.getElementById('valido').style.display='none';
    login_password.style.borderColor="blue";
}else{
  if( validar_email( email_valida ))
  {
      A.innerHTML = "   (Verificando Gmail)";
      A.style.color = "green";
      login_username.style.borderColor="green";
      document.getElementById('valido').style.display='none';
    if( validar_Password( contrasena_valida ))
     {
      B.innerHTML = "   (Verificando Password)";
      B.style.color = "green";
      login_password.style.borderColor="green";
      document.getElementById('valido').style.display='inline';
     }
     else{
      B.innerHTML = "   Esa no es una contraseña valida para el sistema ";
      B.style.color = "red";
      login_password.style.borderColor="red";
      document.getElementById('valido').style.display='none';
     }
  }
  else
  {
     document.getElementById('valido').style.display='none';
     A.innerHTML = "   Eso no es un correo";
     A.style.color = "red";
     login_username.style.borderColor="red";
}}}
}
  </script>
