<?php
class Database{
    const host = 'localhost';
    const banco = 'login';
    const usuario = 'root';
    const senha = '';
    protected $connection;
    
    
    public function connect(){
        $this->connection = new mysqli(self::host, self::usuario, self::senha, self::banco);
        return $this->connection;
    }
}

?>