<?php
$host='localhost';
$user='root';
$pass='';
$db='databasefinal';
$table='tablefinal';
try {
  $pdo = new PDO("mysql:host=$host", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db`");
  $pdo->exec("USE `$db`");
  
  $sql="CREATE TABLE IF NOT EXISTS $table(id INT AUTO_INCREMENT PRIMARY KEY, task VARCHAR(50) NOT NULL, dates VARCHAR(50) NOT NULL)";
  $pdo->exec($sql);
  //echo "Database and Table created sucessfully";
  
}catch(PDOException $e){
  echo "Connection failed" .$e->getMessage();
}
?>