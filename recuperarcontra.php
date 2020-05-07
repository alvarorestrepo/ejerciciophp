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
   <div class="loginfondo">

      <div class="container">
         <div class="d-flex justify-content-center h-100">
            <div class="card">
               <div class="card-header">
                  <h3>Recuperar contraseña</h3>
                  <!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
               </div>
               <div class="card-body">
                  <form >
                     <?php
                     if ($_GET) {
                       $email = $_GET['email'];
                       $password = md5($_GET['password']);

                       include 'conexion.php';
                       $sql = "SELECT email FROM usuarios WHERE email ='$email'";
                       $res = $con->query($sql);
                       $user = $res ->fetch_assoc();
                       
                       if ($res) {

                            if ($user['email'] == $email) {
                                $up = "UPDATE usuarios SET password ='$password' WHERE email = '$email'";
                                $res = $con->query($up);
                                
                            echo "<script>alert('Contraseña cambiada correctamente');</script>";
                            echo "<script>location.href = 'login.php';</script>";
      
                            }
                            echo '<h4 class="text-danger text-center">DATOS incorrectos</h4>';
                            
                     }else{
                        echo '<h4 class="text-danger text-center">DATOS incorrectos</h4>';
                     }
                    }
                     ?>

                     <div class="input-group form-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name='email' class="form-control" placeholder="Email" required autofocus>

                     </div>

                     <div class="input-group form-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name='password' class="form-control" placeholder="Contraseña" required>
                     </div>
                     <div class="row align-items-center remember">
                        <input type="checkbox">Recordar
                     </div>
                     <div class="form-group">
                        <input type="submit" value="Recuperar" class="btn float-right login_btn">
                     </div>
                  </form>
               </div>
               <div class="card-footer">
                  <div class="d-flex justify-content-center links">
                  Ya estas registrado?<a href="login.php">Ingresar</a>
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