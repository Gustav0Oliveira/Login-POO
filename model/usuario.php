<?php

class Usuario {
    private $connect;

    public function __construct($db) {
        $this->connect = $db;
    }

    public function create($nome, $data_nasc, $email, $endereco, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario (nome, data_nasc, email, endereco, senha) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->connect->prepare($query);

        
        $stmt->bind_param("sssss", $nome, $data_nasc, $email, $endereco, $senhaHash);

        
        $stmt->execute();


    }
}