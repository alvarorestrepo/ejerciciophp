
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Emplempresa</title>
</head>
<body>
 <!-- navbar  -->
 <?PHP include("seguridad.php"); ?>

<?php
  include "conexion.php";

   $id=$_GET['id'];
  

if ($_POST) {

    $nom = $_POST['nom'];
    $autor = $_POST['autor'];
    $estan = $_POST['estan'];
    
    
    $sql = "UPDATE  libros  SET nombre_libro='$nom',autor_id='$autor',estanteria_id='$estan' WHERE id = $id"; 
    $res = $con ->query ($sql);  
      if ($res) 
				header('location: index.php');
			
			echo "<p>Error!</p> <a href='index.php'>Volver</a>";
    
}else {
    $sql = "SELECT * FROM `autor_libro_estan_vw` WHERE idlibro = '$id'";

  $res = $con->query($sql);
  $libro = $res->fetch_assoc();
  
}
?>

 <div class="container">
    <div class="row">
        <h2> Editar libro</h2>
    </div>
 </div>
 <div class="container">
 <div class="row">
      <form method='POST' class="col s12">
        <div class="row">
          <div class="input-field col m6 s12">
            <input value="<?=$libro['libro']?>" name='nom'  type="text" data-length="10 "autofocus required>
            <label for="nom">Nombre</label>
          </div>
          
          <div class="input-field col m6 s12">
            <select name='autor'>
           
            <option  selected  value="<?=$libro['idautorlibro']?>"><?=$libro['autor']?></option>
            
                <?php
                include "conexion.php";
                
                $sql="SELECT * FROM autor";
                
                $res = $con->query($sql);

                while ($autor = $res->fetch_assoc()) {
                    echo"<option value='{$autor['id']}'>{$autor['nombre_autor']}</option>";
                }
                
                ?>

                </select>
                <label>Tipo de empresa</label>
            </select>
        </div>
        <div class="input-field col m6 s12">
            <select name='estan'>
           
            <option  selected value="<?=$libro['idestanlibro']?>"><?=$libro['estan']?></option>
            

                <?php
                include "conexion.php";
                
                $sql="SELECT * FROM estanterias";
                
                $res = $con->query($sql);

                while ($estanteria = $res->fetch_assoc()) {
                    echo"<option value='{$estanteria['id']}'>{$estanteria['nombre_estanteria']}</option>";
                }
                
                ?>

                </select>
                <label>Tipo de empresa</label>
            </select>
        </div>
        </div>
   
        <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
            <i class="material-icons right">send</i>
        </button>
        <a href='index.php' class="waves-effect waves-light btn right">Volver</a>
      </form>
     
    </div>
 </div>
 </div>




    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
    $(document).ready(function(){
    $('select').formSelect();
  });
    </script>
</body>
</html>