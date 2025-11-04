<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $mensagem = mysqli_real_escape_string($conn, $_POST['mensagem']);
    
    $servicos = isset($_POST['servicos']) ? implode(", ", $_POST['servicos']) : '';
    
    $sql = "INSERT INTO usuarios (nome, email, telefone, logradouro, numero, complemento, bairro, cidade, servicos, mensagem, data_cadastro) 
            VALUES ('$nome', '$email', '$telefone', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$servicos', '$mensagem', NOW())";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Orçamento solicitado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao enviar: " . mysqli_error($conn) . "');</script>";
    }
}
?>