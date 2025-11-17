<?php
session_start();

$tempo_expiracao = 1;

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit;
}

if (isset($_SESSION['ultimo_acesso']) && (time() - $_SESSION['ultimo_acesso']) > $tempo_expiracao) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

$_SESSION['ultimo_acesso'] = time();

include('conexao.php');

$sql = "SELECT * FROM clientes ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #06402b;
            margin-bottom: 30px;
        }
        .tabela-principal {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 5px;
        }
        .tabela-mensagem {
            width: 100%;
            border-collapse: collapse;
            background: #fafafa;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 1px 5px rgba(0,0,0,0.05);
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        .tabela-principal th {
            background-color: #06402b;
            color: white;
            border-bottom: 2px solid #06402b;
        }
        .tabela-principal td {
            border-bottom: 1px solid #e0e0e0;
        }
        .mensagem-cell {
            padding: 15px;
            background: #f8f9fa;
            border-left: 4px solid #06402b;
        }
        .mensagem-titulo {
            font-weight: bold;
            color: #06402b;
            margin-bottom: 5px;
        }
        .mensagem-conteudo {
            color: #333;
            line-height: 1.4;
        }
        .tabela-principal tr:hover {
            background-color: #f0f8ff;
            transition: background-color 0.3s;
        }
        .cliente-container {
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            overflow: hidden;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .sem-registros {
            text-align: center;
            padding: 40px;
            background: white;
            border-radius: 10px;
            color: #666;
            font-size: 18px;
        }
    </style>
</head>
<body>

<script>
function copiarTexto(idElemento) {
    const texto = document.getElementById(idElemento).value;

    navigator.clipboard.writeText(texto).then(() => {
        const aviso = document.getElementById("copiado" + idElemento.replace("resp",""));
        aviso.style.display = "inline";

        setTimeout(() => {
            aviso.style.display = "none";
        }, 1200);
    });
}
</script>

<h1>Lista de Clientes Cadastrados</h1>

<?php if ($result->num_rows > 0): ?>

    <?php while($row = $result->fetch_assoc()): ?>
    
    <div class="cliente-container">
        
        <table class="tabela-principal">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Logradouro</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Serviços</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><strong><?= $row['id']; ?></strong></td>
                    <td><?= htmlspecialchars($row['Nome']); ?></td>
                    <td><?= htmlspecialchars($row['email']); ?></td>
                    <td><?= htmlspecialchars($row['Telefone']); ?></td>
                    <td><?= htmlspecialchars($row['Logradouro']); ?></td>
                    <td><?= htmlspecialchars($row['Numero']); ?></td>
                    <td><?= htmlspecialchars($row['Complemento']); ?></td>
                    <td><?= htmlspecialchars($row['Bairro']); ?></td>
                    <td><?= htmlspecialchars($row['Cidade']); ?></td>
                    <td><?= htmlspecialchars($row['Servicos']); ?></td>
                </tr>
            </tbody>
        </table>
        
        <table class="tabela-mensagem">
            <tr>
                <td class="mensagem-cell">
                    <div class="mensagem-titulo">Mensagem do Cliente:</div>

                    <div class="mensagem-conteudo">
                        <?= nl2br(htmlspecialchars($row['Mensagem'])); ?>
                    </div>

                    <hr style="margin:15px 0;">

                    <div class="mensagem-titulo">Resposta Automática (Sugerida: LEMBRE-SE TROCAR AS INFORMAÇÕES CONFORME A NECESSIDADE):</div>

                    <?php 
                        $resposta = 
                        "Olá " . htmlspecialchars($row['Nome']) . ", tudo bem?\n\n" .
                        "Vi que você entrou em contato sobre \"" . htmlspecialchars($row['Servicos']) . "\".\n" .
                        "Agradeço seu interesse! Estou retornando para ajudar com sua solicitação.\n\n" .
                        "Se precisar de mais alguma informação, estou à disposição!\n\n" .
                        "Atenciosamente.\n\n3R-JARDINAGEM";
                    ?>

                    <textarea id="resp<?= $row['id']; ?>" 
                        readonly
                        style="width:100%; height:150px; margin-top:10px; padding:10px; border:1px solid #ccc; border-radius:8px; resize:none;">
                    <?= $resposta ?>
                    </textarea>

                    <button onclick="copiarTexto('resp<?= $row['id']; ?>')" 
                        style="margin-top:10px; background:none; border:none; cursor:pointer; color:blue; font-weight:bold;">
                        Copiar
                    </button>

                    <span id="copiado<?= $row['id']; ?>" 
                        style="display:none; margin-left:10px; color:green; font-size:13px;">
                        Copiado!
                    </span>

                </td>
            </tr>
        </table>

    </div>
    
    <?php endwhile; ?>

<?php else: ?>
    <div class="sem-registros">
        Nenhum cliente cadastrado ainda.
    </div>
<?php endif; ?>

</body>
</html>