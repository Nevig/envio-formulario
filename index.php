<!DOCTYPE html>
<html>
<head>
	<title>Contacto</title>
	<link rel="stylesheet" type="text/css" href="css/estilo-form.css">
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
	<script src='js/funciones.js'></script>
</head>
	<body>

		<?php
			if(isset($_POST['boton'])){
				/*$errors = array(); // declaramos array para almacenar los errores
				if($_POST['nombre'] == ''){
					$errors[1] = '<span class="error">Ingrese su nombre</span>';
				}else if($_POST['email'] == '' or !preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-\.]+$/",$_POST['email'])){
					$errors[2] = '<span class="error">Ingrese un email correcto</span>';
				}else if($_POST['message'] == ''){
					$errors[3]= '<span class="error">Ingrese un mensaje</span>';
				}else{*/
					$dest = "nevi74@gmail.com";//Email de destino
					$nombre = $_POST['nombre'];
					$email = $_POST['email'];
					$cuerpo = $_POST['message'];//Cuerpo del mensaje

					//Cabeceras del correo para que no llegue a spam
					$headers = "De: $nombre $email\r\n"; //Quien envia?
					$headers .= "X-Mailer: PHP5\n";
					$headers .= 'MIME-Version: 1.0' . "\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					mail($dest, $nombre, $email, $cuerpo, $headers) ;
					if(mail($dest, $nombre, $email, $cuerpo, $headers)){//esta es una comparación para ver si envio el mail o no 
						$result = '<div class="result_ok">Email enviado correctamente</div>';
						// si el envio fue exitoso reseteamos lo que el usuario escribio:
						$_POST['nombre'] = "";
						$_POST['email'] = "";
						$_POST['message'] = "";
					}else{
						$result = '<div class="result_fail">Hubo un error al enviar el mensaje</div>';
					}
			}
		?>
		<form id="contactform" method="POST" action="<?=$_SERVER['PHP_SELF'];?>">

			<!-- <div class="box"> -->

				<h1> Formulario de Contacto</h1>

				<div class="field">
					<label>
						<span> Nombre *:</span>
						<input type="text" class="nombre" name="nombre" id="name" />
						<p class="hint"> Ingresa tu nombre.</p>
					</label>
				</div>

				<div class="field">
					<label>
						<span> Email *:</span>
						<input type="email" title="mail@ejemplo.com" class="email" name="email" id="email" />
						<!--<p class="hint"> Ingresa tu email.</p>-->
					</label>
				</div>

				<div class="field">
					<label>
						<span> Empresa:</span>
						<input type="text" class="empresa" name="empresa" id="empresal"/>
						<!--<p class="hint"> Ingresa tu empresa.</p> -->
					</label>
				</div>

				<div class="field">
					<label>
						<span> Mensaje *:</span>
						<textarea class="message" name="message" id="feedback" ></textarea>
						<!--<p class="hint"> Escribe tu mensaje.</p>-->
					</label>
				</div>		
				<input type="submit" class="boton" name="boton" value="Enviar"/>

		</form>
		<?php echo $result;?>

	</body>
</html>
