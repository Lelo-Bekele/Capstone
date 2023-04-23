<?php
$username	= 'root';
$password	= '';
$host	= 'localhost';
$dbname	= 'cheminventory';
$dsn	= "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = 'use cheminventory';
} catch(PDOException $error) {
  echo $error->getMessage();
}

?>