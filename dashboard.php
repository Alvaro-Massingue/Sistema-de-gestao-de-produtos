<?php
    session_start();
    if(!$_SESSION['nome']){
    header("Location: index.php");
    }
    include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico</title>
    <link rel="stylesheet" href="./Style/cadastro.css">
</head>
<body>
    <header>
        <nav>
            <a href="home.php">Home</a>
            <a href="cadastro.php">Cadastrar Produtos</a>
            <a href="produtos.php">Produtos disponíveis</a>
            <a href="vender.php">Vendas</a>
            <a href="dashboard.php">Dashboard</a>
        </nav>
        
        <?php echo "<p><b>Usuario</b>:@{$_SESSION['nome']}<a href=logout.php>Sair</a></p>";?>
       
    </header>
    <?php   displayMessage("Página ainda em desenvolvimento")?>
</body>
</html>