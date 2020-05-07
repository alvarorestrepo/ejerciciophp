<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/font.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>

<body>

	<?php
	if ($_POST) {
		include 'conexion.php';
		$user = $_POST['user'];
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		$rol = $_POST['rol'];
		$sql = "INSERT INTO usuarios (nombre,email,password,id_rol) VALUE ('$user','$email','$pass','$rol')";

		$res = $con->query($sql);
		if ($res) {
			echo "<script>alert('Registro exitoso')</script>";
			echo "<script>location.href='login.php';</script>";
		} else {
			echo "<script>alert('Registro no exitoso')</script>";
		}
	}

	?>
	<div class="loginfondo">

		<div class="container">
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Registrar</h3>
						<!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
					</div>
					<div class="card-body">
						<form method="post">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name='user' class="form-control" placeholder="Usuario" required autofocus>

							</div>

							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-envelope"></i></span>
								</div>
								<input type="email" name='email' class="form-control" placeholder="Email" required>

							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-th-list"></i></span>
								</div>
								<select class="custom-select" name="rol" id="inputGroupSelect01">
									<option selected disabled>Tipo Usuario...</option>
									<option value="1">Administrador</option>
									<option value="2">Usuario</option>

								</select>
							</div>

							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name='password' class="form-control" placeholder="Contraseña" required>
							</div>

							<div class="form-group">
								<input type="submit" value="Enviar" class="btn float-right login_btn">
							</div>
						</form>
					</div>
					<div class="card-footer">
						<div class="d-flex justify-content-center links">
							Ya estas registrado?<a href="login.php">Ingresar</a>
						</div>
						<div class="d-flex justify-content-center">
							<a href="recuperarcontra.php">Recuperar contraseña?</a>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
</body>

</html>