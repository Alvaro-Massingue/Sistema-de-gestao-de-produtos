<?php
session_start();
if(!$_SESSION['nome']){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./Style/home.css">
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

        <?php echo "<p><b>User</b>:@{$_SESSION['nome']}<a href=logout.php>Sair</a></p>";?>

    </header>
    <div class="container">
        <div class="imagem">
            <img src="./img/1000734635.jpg" width="70%" alt="">
        </div>
        <div class="conteudo">
            <p>Faça a gestão eficaz do seu negócio</p>
            <b>AQUI</b>
        </div>
    </div>
</body>

</html>