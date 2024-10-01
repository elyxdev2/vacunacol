<?php
$possible_core_route_a = "../utils/core.php";
$possible_core_route_b = "utils/core.php";
$possible_core_route_b = "core.php";

if (file_exists($possible_core_route_a)) {
  require $possible_core_route_a;
} else {
  if (file_exists($possible_core_route_b)) {
    require $possible_core_route_b;
  } else {
    if (file_exists($possible_core_route_c)) {
        require $possible_core_route_b;
    } else {
        exit("Fatal error.");
    }
  }
}

class conexion_m {
  // Credenciales de la base de datos
  private $d_host = "localhost";
  private $d_usuario = "root";
  private $d_pswd = "";
  private $d_db = "vacunacol";
  public $conexion;

  public function __construct() {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
      $this->conexion = mysqli_connect($this->d_host, $this->d_usuario, $this->d_pswd, $this->d_db);
    } catch (mysqli_sql_exception $e) {
      echo "Error: " . $e->getMessage();
      exit();
    }
  }

  // Método para ejecutar consultas
  public function query($sql) {
    return mysqli_query($this->conexion, $sql);
  }

  // Cerrar la conexión
  public function close() {
    mysqli_close($this->conexion);
  }
}

// Establecer conexión (old)
// $conexion = new mysqli($d_host, $d_usuario, $d_pswd, $d_db);