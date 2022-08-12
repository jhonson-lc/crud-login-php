<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require_once "scripts.php"; ?>
</head>
<body>
<br><br><br>
<h2 style="text-align:center">Iniciar Sesión</h2>
<div style="margin-bottom:20px;display:flex;justify-content:center;">
	<div class="easyui-panel"  style="width:100%;max-width:400px;padding:30px 60px;">
		<form id="ff" method="post" action="php/login.php">
				<div style="text-align: center;">
					<img src="img/uta.jpg" height="250">
				</div>
				<p style="margin:10px; text-align:center;">Llenar todos los campos</p>
				<div style="margin-bottom:20px">
					<input type="text" class="easyui-textbox" id="usuario" style="width:100%" data-options="label:'Usuario:',required:true">
				</div>
				<div style="margin-bottom:20px">
					<input type="password" class="easyui-textbox" id="password" pattern="[A-Za-Z0-9_-]{1}" style="width:100%" data-options="label:'Contraseña:',required:true">
				</div>
		</form>
		<div style="text-align:center;padding:5px 0;">
				<a href="javascript:void(0)" class="easyui-linkbutton" id="entrarSistema" style="width:150px">Iniciar Sesión</a>
		</div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Complete el campo de usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Complete el campo de password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){

							if(r==1){

							alert('Bienvenido '+ $('#usuario').val()+'  Gracias Por Acceder al Sistema');
							window.location="indexAdmin.php";
							session_start();

							} else if(r==2){
							alert('Bienvenid@ Estudiante: '+ $('#usuario').val()+'  Gracias Por Acceder al Sistema');
							window.location="indexEstu.php";
							session_start();
							}
							else{
							alertify.alert("Usuario y/o Contraseña Incorrectos");
							}
						}
					});
		});	
	});
</script>