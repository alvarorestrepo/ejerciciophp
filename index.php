<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <?PHP include("seguridad.php"); ?>


  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Hola <strong><?= $_SESSION['nombre'] ?></strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="nuevolibro.php">Crear libro <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="salir.php">Salir</a>
        </li>

      </ul>
    </div>
  </nav>

  <div class="container">
    <table class="table table-striped">
      <thead>
        <tr>

          <th scope="col">Nombre del libro</th>
          <th scope="col">Autor</th>
          <th scope="col">Estanteria</th>

          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          require_once 'conexion.php';

          $sql = "SELECT l.nombre_libro, e.nombre_estanteria, a.nombre_autor, l.id AS idlibro
                  FROM libros l 
                  INNER JOIN estanterias e ON l.estanteria_id = e.id 
                  INNER JOIN autor a ON l.autor_id = a.id ";

          $res = $con->query($sql);
          while ($libro = $res->fetch_assoc()) {

            echo '<tr>';
            echo "<td>{$libro['nombre_libro']}</td>";
            echo "<td>{$libro['nombre_autor']}</td>";
            echo "<td>{$libro['nombre_estanteria']}</td>";

            if ($_SESSION['rol'] == 'Admin') {
              echo "<td>
            <a href='editar.php?id={$libro['idlibro']}' class='waves-effect  yellow darken-1 btn'>
            <i class='material-icons'>create</i>
            </a>
            <a onclick='return confirm(&#39;Está seguro de eliminar el registro&#39;)' href='eliminar.php?id={$libro['idlibro']}' class='waves-effect deep-orange darken-2 btn'>
              <i class='material-icons'>delete_sweep</i>
              </a>
        </td>";
            }



            echo '</tr>';
          }

          ?>


        </tr>

      </tbody>
    </table>
  </div>




  <script src="js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>