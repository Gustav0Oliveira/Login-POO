<?php

require_once '../config/database.php';
require_once '../model/usuario.php';

class controllerUsuario{
    public function create($nome){
        $database = new Database();
        $db = $database->connection();

        $usuario = new Usuario($db);
        $usuario->nome = $_POST['nome'];
        $usuario->data_nasc = $_POST['data_nasc'];
        $usuario->email = $_POST['email'];
        $usuario->endereco = $_POST['endereco'];
        $usuario->senha = $_POST['senha'];
    }
}


?>