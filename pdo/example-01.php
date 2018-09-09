<?php
/**
 * Created by PhpStorm.
 * User: fernando
 * Date: 18/12/17
 * Time: 01:12
 */

$host = "localhost";
$schema = "dbphp7";
$username = "root";
$password = "";

$connection = new PDO("mysql:host={$host};dbname={$schema}", $username, $password);

$statement = $connection->prepare("TRUNCATE TABLE tb_usuarios");
$statement->execute();
$statement = $connection->prepare("INSERT INTO tb_usuarios(loginUsuario, senhaUsuario) VALUES ('root', '!@#$')");
$statement->execute();
$statement = $connection->prepare("INSERT INTO tb_usuarios(loginUsuario, senhaUsuario) VALUES ('fernando_s97', '123456')");
$statement->execute();
$statement = $connection->prepare("INSERT INTO tb_usuarios(loginUsuario, senhaUsuario) VALUES ('user', '123456')");
$statement->execute();
$statement = $connection->prepare("SELECT * FROM tb_usuarios ORDER BY loginUsuario");
$statement->execute();

$results = $statement->fetchAll(PDO::FETCH_ASSOC);

/*foreach ($results as $row) {
    foreach ($row as $key => $value) {
        echo "<p><strong>$key:</strong> $value</p>";
    }
    echo "============================";
}*/

echo json_encode($results);
