<?php

require_once('config.php');

/*
$sql = new Sql();
$usuarios = $sql->select('SELECT * FROM tb_usuario');

echo json_encode($usuarios);
*/

/*// Carrega 1 usuário pelo id
$usuario = new Usuario();
$usuario->loadById(1);

echo $usuario;
*/

/*// Carrega uma lista de usuários
$usuarios = Usuario::getUsers();

echo json_encode($usuarios);
*/

/*// Encontra usuários por um pedaço do login
$usuarios = Usuario::searchByLogin('m');

echo json_encode($usuarios);
*/

// Carrega um usuário usando login e senha
$usuario = new Usuario();
$usuario->login('maria', 'maria');

echo $usuario;

?>