<?php
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