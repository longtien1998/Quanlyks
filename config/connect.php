<?php
function connect_db()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanlykhachsan";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
?>
