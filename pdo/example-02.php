<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 18/12/17
 * Time: 01:12
 */

$server = "localhost\SQLEXPRESS";
$database = "dbphp7";
$username = "SA";
$password = "VCf3rn@ndo!0";

$connection = new PDO("sqlsrv:Server={$server};Database={$database};ConnectionPooling=0", $username, $password);

$statement = $connection->prepare("SELECT * FROM dbphp7.tb_usuarios ORDER BY loginUsuario");
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);