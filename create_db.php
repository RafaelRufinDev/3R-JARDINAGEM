<?php
// create_db.php
// Executa o arquivo database.sql para criar o banco e tabelas.
// Ajuste as credenciais caso seu MySQL não use root sem senha.

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$file = __DIR__ . DIRECTORY_SEPARATOR . 'database.sql';

if (!file_exists($file)) {
    echo "Arquivo database.sql não encontrado em: $file\n";
    exit(1);
}

$sql = file_get_contents($file);
if ($sql === false) {
    echo "Falha ao ler o arquivo SQL.\n";
    exit(1);
}

$mysqli = new mysqli($host, $user, $pass);
if ($mysqli->connect_error) {
    echo "Erro de conexão: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error . "\n";
    exit(1);
}

// Permitir múltiplas consultas
if ($mysqli->multi_query($sql)) {
    do {
        if ($result = $mysqli->store_result()) {
            // consumir resultado, se houver
            $result->free();
        }
        if ($mysqli->more_results()) {
            // continuar
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
    echo "Execução do arquivo SQL finalizada.\n";
} else {
    echo "Erro ao executar SQL: " . $mysqli->error . "\n";
    exit(1);
}

$mysqli->close();

// Verificação rápida: conectar ao DB criado
$mysqli2 = new mysqli($host, $user, $pass, 'jardinagem_db');
if ($mysqli2->connect_errno) {
    echo "Aviso: Não foi possível conectar ao banco 'jardinagem_db' para verificação: (" . $mysqli2->connect_errno . ") " . $mysqli2->connect_error . "\n";
    exit(0);
}

echo "Banco 'jardinagem_db' acessível e criado com sucesso.\n";
$mysqli2->close();

return 0;
