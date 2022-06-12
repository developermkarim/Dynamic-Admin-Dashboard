<?php
class Database{
    private $dbhost = "localhost";
    private $dbname = "admin_dashboard";
    private $dbuser = "root";
    private $dbpassword = "";
    public $con;
    public function DB_Connect()
    {
       $this->con = null;
       try {
        $db_stmt = new PDO("mysql:host=".$this->dbhost.";dbname=".$this->dbname,$this->dbuser,$this->dbpassword);
        $db_stmt->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->con = $db_stmt;
       } catch (PDOException $error) {
        echo "database connection".$error->getMessage();
       }
       return $this->con;
    }
}
?>