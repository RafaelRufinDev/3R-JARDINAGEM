<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "";
$banco    = "3rjardinagem";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão realizada com sucesso!";
}
?>
