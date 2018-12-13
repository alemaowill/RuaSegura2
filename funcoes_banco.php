<?php

//configuração do banco
$host = "localhost";
$driver = "mysql";

function conectar_banco($dbname = "") {
    if ($dbname != "") {
        $dbname = "dbname=${dbname};";
    }
    $driver = "mysql";
    $host = "localhost";

    //senha do xampp
    $username = 'root';
    $password = '123';

    $dsn = "${driver}:host=${host};charset=utf8mb4;${dbname}";
    $options = [
        // desliga emulação para PreparedStatements
        PDO::ATTR_EMULATE_PREPARES => false,
        // força exceções em caso de erros
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        // define o retorno padrão dos dados em um array associativo
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
    return $pdo;
}

function criar_banco($pdo) {
    $sql = "CREATE DATABASE IF NOT EXISTS ruaSegura";
    $pdo->exec($sql);
}

function criar_tabela($pdo) {
    $sql = "CREATE TABLE IF NOT EXISTS ruaSegura.denuncias (nome varchar(30), email varchar(50)"
            . ",generos varchar(10), tipo varchar(15), locais varchar(30))";

    $pdo->exec($sql);
}

function inserir_denuncia($pdo, $nome, $email, $generos, $tipo, $locais) {
    $sql = "INSERT INTO ruaSegura.denuncias(nome, email, generos,tipo,locais) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $generos, $tipo, $locais]);
    return $sql;
}
