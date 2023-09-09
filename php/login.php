<!DOCTYPE html>
<html>
<head>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <?php
  // Se utiliza para llamar al archivo que contiene la conexión a la base de datos
  require 'conexion.php';

  // Validamos que el formulario y que el botón login haya sido presionado
  if(isset($_POST['login'])) {

    // Obtener los valores enviados por el formulario
    $usuario = $_POST['nombre_user'];
    $contrasena = $_POST['contrasena_user'];

    // Ejecutamos la consulta a la base de datos utilizando la función mysqli_query
    $sql = "SELECT * FROM usuarios WHERE nombre_user = '$usuario' and contrasena_user = '$contrasena'";
    $resultado = mysqli_query($conexion,$sql);
    $numero_registros = mysqli_num_rows($resultado);
    if($numero_registros != 0) {
      // Inicio de sesión exitoso
      echo "<table>";
      echo "<tr>";
      echo "<th>Nombre</th>";
      echo "<th>Edad</th>";
      echo "<th>Cargo</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td>Lisbeth de los Angeles Duarte</td>";
      echo "<td>20</td>";
      echo "<td>Administradora de las paginas </td>";
      echo "</tr>";
      echo "<tr>";
      echo "</table>";
    } else {
      // Credenciales inválidas
      echo "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña."."<br>";
      echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
  }
  ?>
</body>
</html>
