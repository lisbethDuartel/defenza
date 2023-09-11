<!DOCTYPE html>
<html>
<head>
  <style>
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
     
      background-color:  #34495e ;
    }
    
    .message {
      font-size: 24px;
      font-weight: bold;
      color: white;
      margin-bottom: 20px;
    }
    
    .info {
      font-size: 18px;
      color: #bbc2ba;
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
      echo "<div class='container'>";
      echo "<div class='message'>Inicio de sesión exitoso</div>";
      echo "<div class='info'>Nombre: carlos jose reyes</div>";
      echo "<div class='info'>Edad: 20</div>";
      echo "<div class='info'>Cargo: soy el encargado de HelpEASA</div>";
      echo "</div>";
    } else {
      // Credenciales inválidas
      echo "<div class='container'>";
      echo "<div class='message'>Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña.</div>";
      echo "<div class='info'>Error: " . $sql . "<br>" . mysqli_error($conexion) . "</div>";
      echo "</div>";
    }
  }
  ?>
</body>
</html>

