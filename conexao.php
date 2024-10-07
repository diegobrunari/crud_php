<?php

require 'vendor/autoload.php'; // Carregue o autoload do Composer

use Dotenv\Dotenv;

// Carregar as variáveis do arquivo .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

define('HOST', $_ENV['HOST']);
define('PORT', $_ENV['PORT']);
define('DBNAME', $_ENV['DBNAME']);
define('ADMUSER', $_ENV['ADMUSER']);
define('ADMPASS', $_ENV['ADMPASS']);

try {
    // Faz conexão com o banco de dados
    if (!isset($_ENV['HOST'], $_ENV['PORT'], $_ENV['DBNAME'], $_ENV['ADMUSER'], $_ENV['ADMPASS'])) {
        die("Variáveis de ambiente não estão configuradas corretamente.");
    } else {
        $conectar = new PDO("mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME . ";", ADMUSER, ADMPASS);
    }
} catch (PDOException $e) {
    // Caso ocorra algum erro
    echo "Falha ao conectar com o banco de dados: " . $e->getMessage();
}
