<?php
// config/Database.php
class Database{
   private $host='localhost';
   private $db_name='db_ferroelectro';
   private $username='root';
   private $password='root';
   private $conn;

   // Método para obtener la conexión a la base de datos
   public function connect(){
      $this->conn = null;

      try {
         $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
            $this->username,
            $this->password
         );
         $this->conn->exec("set names utf8");
         // Se configura el modo de error de PDO para que lance excepciones
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $exception) {
         echo "Error de conexión: " . $exception->getMessage();
      }

      return $this->conn;
   }
}
?>