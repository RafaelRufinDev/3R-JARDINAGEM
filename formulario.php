<?php
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $logradouro = $_POST['logradouro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $servicos = isset($_POST['servicos']) ? implode(", ", $_POST['servicos']) : "";
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO clientes (Nome, email, Telefone, Logradouro, Numero, Complemento, Bairro, Cidade, Servicos, Mensagem)
            VALUES ('$nome', '$email', '$telefone', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$servicos', '$mensagem')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Formulario respondido com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao enviar: " . addslashes($conn->error) . "');
                window.history.back();
              </script>";
    }
}

$resultado = $conn->query("SELECT * FROM clientes");
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylec.css">
    <link rel="shortcut icon" href="assets/logo_t.png" type="image/x-icon">
    <link rel="stylesheet" href="stylec.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>3R JARDINAGEM</title>
</head>

<body>

    <header>
        <div class="container">
            <div class="logo">3R JARDINAGEM</div>
            <nav class="menu">
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="formulario.php" class="active">Contato</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="formulario">
        <h1>Solicite o seu orçamento!</h1>

        <form method="post" action="formulario.php" class="contact-form" novalidate>

            <div class="form-group">
                <label for="nome">Nome</label><br>
                <input id="nome" name="nome" type="text" required maxlength="100" placeholder="Seu nome completo"
                    autocomplete="name">
            </div>

            <div class="form-group">
                <label for="email">E‑mail</label><br>
                <input id="email" name="email" type="email" required placeholder="seu@exemplo.com" autocomplete="email">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label><br>
                <input id="telefone" name="telefone" type="tel" pattern="[\d\s\-\+\(\)]{8,20}" maxlength="20"
                    placeholder="(11) 99999-9999" autocomplete="tel">
            </div>

            <div class="address-section">
                <div class="address-title"><strong>Endereço</strong></div>

                <div class="form-group">
                    <label for="logradouro">Logradouro</label><br>
                    <input id="logradouro" name="logradouro" type="text" maxlength="150"
                        placeholder="Rua, Av., Travessa..." autocomplete="street-address">
                </div>

                <div class="form-row">
                    <div>
                        <label for="numero">Número</label><br>
                        <input id="numero" name="numero" type="text" maxlength="10" placeholder="Nº">
                    </div>
                    <div>
                        <label for="complemento">Complemento</label><br>
                        <input id="complemento" name="complemento" type="text" maxlength="100"
                            placeholder="Apto, Casa, Bloco..."><br>
                    </div>
                </div>

                <div class="form-row">
                    <div>
                        <label for="bairro">Bairro</label><br>
                        <input id="bairro" name="bairro" type="text" maxlength="100" placeholder="Bairro"><br>
                    </div>

                    <div>
                        <label for="cidade">Selecione a cidade onde você mora:</label><br>

                        <select id="cidade" name="cidade" required>
                            <option value="" disabled selected>Escolha a Cidade</option>

                            <option>Camutanga</option>
                            <option>Ferreiros</option>
                            <option>Timbaúba</option>
                            <option>Ibiranga</option>
                            <option>Serrinha</option>
                            <option>Juripiranga</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <h3>Quais serviços você está interessado?</h3>

                <div class="checkbox-group">
                    <div><input type="checkbox" id="poda1" name="servicos[]" value="poda_arbustos"><label for="poda1">
                            Poda de arbustos e cerca-viva</label></div>
                    <div><input type="checkbox" id="poda2" name="servicos[]" value="poda_folhagens"><label for="poda2">
                            Poda de folhagens e flores secas</label></div>
                    <div><input type="checkbox" id="poda3" name="servicos[]" value="poda_arvores"><label for="poda3">
                            Poda de árvores</label></div>

                    <div><input type="checkbox" id="gramado1" name="servicos[]" value="corte_gramado"><label
                            for="gramado1"> Corte regular do gramado</label></div>
                    <div><input type="checkbox" id="gramado2" name="servicos[]" value="aparar_bordas"><label
                            for="gramado2"> Aparar bordas e cantos</label></div>
                    <div><input type="checkbox" id="gramado3" name="servicos[]" value="remocao_ervas"><label
                            for="gramado3"> Remoção de ervas daninhas</label></div>

                    <div><input type="checkbox" id="adubacao" name="servicos[]" value="adubacao"><label for="adubacao">
                            Aplicação de fertilizantes orgânicos</label></div>

                    <div><input type="checkbox" id="plantio1" name="servicos[]" value="plantio_mudas"><label
                            for="plantio1"> Plantio de novas mudas e espécies</label></div>
                    <div><input type="checkbox" id="plantio2" name="servicos[]" value="implantacao_gramado"><label
                            for="plantio2"> Implantação de gramados (por tapetes)</label></div>

                    <div><input type="checkbox" id="limpeza1" name="servicos[]" value="limpeza_jardins"><label
                            for="limpeza1"> Limpeza e manutenção de jardins</label></div>
                    <div><input type="checkbox" id="limpeza2" name="servicos[]" value="remocao_folhas"><label
                            for="limpeza2"> Remoção de folhas e detritos</label></div>
                    <div><input type="checkbox" id="limpeza3" name="servicos[]" value="limpeza_canteiros"><label
                            for="limpeza3"> Limpeza de canteiros e bordas</label></div>
                    <div><input type="checkbox" id="limpeza4" name="servicos[]" value="limpeza_patios"><label
                            for="limpeza4"> Limpeza de pátios e calçadas</label></div>
                </div>
            </div>

            <div class="form-group">
                <label for="mensagem">Mensagem</label><br>
                <textarea id="mensagem" name="mensagem" required maxlength="2000" rows="6"
                    placeholder="Descreva, mais detalhadamente, o serviço que você precisa"></textarea>
            </div>

            <div class="form-actions" style="margin-top:12px;">
                <button type="submit">Enviar</button>
            </div>

        </form>
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <h3>3R JARDINAGEM</h3>
                <p>Nossa missão é criar espaços verdes bonitos e organizados proporcionando qualidade de vida e contato
                    com a natureza.</p>
            </div>
            <div class="footer-contact-form">
                <h4>Contato Rápido</h4>
                <form action="#" method="post">
                    <input type="text" placeholder="Seu Nome" required>
                    <input type="email" placeholder="Seu Email" required>
                    <textarea placeholder="Mensagem" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
                <p class="area-atendimento"> Atendemos em Camutanga e Região.</p>
            </div>
            <div class="footer-info">
                <p>(81) 98660-1331 - Rafael</p>
                <p>(81) 98598-4154 - Borges</p>
                <p>3rjardinagem@gmail.com</p>
            </div>
            <div class="footer-social">
                <a href="https://www.instagram.com/3r_jardinagens?utm_source=qr&igsh=MXdsN2VqZm1pZXNibg=="
                    target="_blank"> <i class="fa-brands fa-instagram"></i></a>
                <a href="https://wa.me/5581985984154" target="_blank"> <i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>
</body>

</html>