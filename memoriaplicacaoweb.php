<?php
//                    // Definindo um cookie
//                    setcookie('usuario', 'João Silva', time() + 3600, '/'); // expira em 1 hora
//
//                    // Acessando o cookie
//                    if (isset($_COOKIE['usuario'])) {
//                        echo 'Bem-vindo, ' . $_COOKIE['usuario'];
//                    }



//                    // Inicia a sessão
//                    session_start();

//                    // Armazena dados na sessão
//                    $_SESSION['usuario'] = 'Ana Souza';

//                    // Acessa os dados
//                    echo 'Seja bem-vinda, ' . $_SESSION['usuario'];

                    // Destrói a sessão (logout)
                    // session_destroy();




                    $contador = 0;
                    $contador++;
                    echo "Contagem: $contador"; // Saída: Contagem: 1



                    $key = 'dados_usuario_123';
                    $ttl = 3600; // tempo de vida do cache em segundos

                    if (apcu_exists($key)) {
                        $dados = apcu_fetch($key);
                        echo 'Do cache: ' . json_encode($dados);
                    } else {
                        $dados = ['nome' => 'Carlos', 'idade' => 30];
                        apcu_store($key, $dados, $ttl);
                        echo 'Armazenado no cache.';
                    }

?>




<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <?php if (isset($_SESSION['erro'])): ?>
        <p style="color:red;"><?=$_SESSION['erro']?></p>
        <?php unset($_SESSION['erro']); ?>
    <?php endif; ?>
    
    <form action="login.php" method="post">
        Usuário: <input type="text" name="usuario"><br>
        Senha: <input type="password" name="senha"><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>






<?php
session_start();

if (!isset($_SESSION['logado'])) {
    header('Location: index.php');
    exit;
}

echo "<h2>Bem-vindo(a), {$_SESSION['usuario']}!</h2>";
echo "<p>Esta é sua área privada.</p>";
echo "<a href='logout.php'>Sair</a>";






<?php
session_start();
session_destroy();
header('Location: index.php');
exit;




