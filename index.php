'<?php
session_start();

// Processa logout
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Processa login
$nome = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars($_POST['nome'] ?? '');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if ($nome && $email && $senha) {
        $_SESSION['nome'] = $nome;
        header("Location: index.php");
        exit;
    } else {
        $erro = "Por favor, preencha todos os campos corretamente.";
    }
}


// <link rel="stylesheet" href="css/style.css">
// <link rel="stylesheet" href="css/style.css">
//Para eu lembrar que sempre deverei linkar o php e html para o css


// PARA STARTAR SESSION 

//    session_start();

//    $nome_input = $_GET['nome];

//    $_SESSION['nome'] = "$nome_input";

//    echo "<br> Sua sessão está ativa " . $_SESSION['nome'];



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MISSÃO: Agente de Memória Temporária WEB</title>


    <link rel="stylesheet" href="css/style.css">
   

</head>



<body>

<div class="container">
    



    <?php if (!isset($_SESSION['nome'])): ?>

        <h2>Identifique-se, Agente</h2>

        <?php if (isset($erro)): ?>
            <div class="error"><?= $erro ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="nome" placeholder="Nome Completo" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <button type="submit">Iniciar Missão</button>
        </form>


 

    <?php else: ?>


//    session_start();
//    $_SESSION['nome'] = "nome_imput";
//    echo "<br> Sua sessão está ativa " . $_SESSIOM['nome];

        <div class="mensagem">
            <p>Oi, <?= $_SESSION['nome'] ?>. Sua sessão está ativa.</p>
            <form method="get">
                <button type="submit" name="logout" value="1">Encerrar Sessão</button>
            </form>
        </div>

        <?php if (isset($_GET['logout'])): ?>
            <div class="mensagem logout-msg">
                Sessão encerrada com Sucesso!!!<br>
                <strong>"Asta la vista Baby!!!"</strong>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</div>

</body>
</html>