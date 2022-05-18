<?php
$host= "localhost";
$dbName= "evancweb1113";
$userName= "root";
$password= "";
try 
{
    $con = new PDO("mysql:host={$host};dbname={$dbName}",$userName,$password);
    //echo"Connection ok";
}

catch (PDOException $e)
{
    echo"Connection error:" .$e -> getMessage();
}


?>