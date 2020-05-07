<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>nuevo libro</title>
</head>
<body>
 
 

<?php
if ($_GET) {
  include "conexion.php";

    $nom = $_GET['nom'];
    $autor = $_GET['autor'];
    $estan = $_GET['estan'];
    
    
    $sql = "INSERT INTO libros (nombre_libro,estanteria_id,autor_id) 
                            VALUE ('$nom','$autor','$estan')";
                           
                            
        
        $res = $con ->query ($sql);  
        
        if ($res) 
            header('location:index.php');
        
}


?>


 <div class="container">
    <div class="row">
        <h2> Crear libro</h2>
    </div>
 </div>
 <div class="container">
 <div class="row">
      <form  class="col s12">
        <div class="row">
          <div class="input-field col m6 s12">
            <input name='nom' id="nom" type="text" data-length="10 "autofocus required>
            <label for="nom">Nombre</label>
          </div>
          
        </div>
        <div class="row">
        <div class="input-field col m6 s12">
            <select name='estan'>

            <?php
                include "conexion.php";
                
                $sql="SELECT * FROM estanterias";

                $res = $con->query($sql);

                while ($estan= $res->fetch_assoc()) {
                    echo"<option value='{$estan['id']}'>{$estan['nombre_estanteria']}</option>";
                }
                
                ?>
                </select>

                <label>Estanteria</label>

            </select>
        </div>
       
          
          <div class="input-field col m6 s12">
            <select name='autor'>
                "<option value="" disabled selected>Autor</option>"

                <?php
                include "conexion.php";
                
                $sql="SELECT * FROM autor";

                $res = $con->query($sql);

                while ($autor= $res->fetch_assoc()) {
                    echo"<option value='{$autor['id']}'>{$autor['nombre_autor']}</option>";
                }
                
                ?>

                </select>
                <label>Autores</label>
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
     </script>
        
        
</body>
</html>