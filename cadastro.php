<?php
session_start();
if(!$_SESSION['nome']){
    header("Location: index.php");
}else{
    include "conexao.php";

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['adicionar'])){
            $nome=$_POST['nome'];
            $descricao=$_POST['descricao'];
            $preco=$_POST['preco'];
            $data=date("Y/m/d");

            $sql="INSERT INTO produto (`nome`,`descricao`,preco,`data`) VALUES ('$nome','$descricao',$preco,'$data')";
            if(mysqli_query($conn,$sql)){
                
                header("Location: cadastro.php");
            }
        }
    }
}
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar produtos</title>
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
   <div class="container">
        <p>Cadastrar novo produto</p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome do produto" name="nome" require>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" require>
            <label for="preco">Preço</label>
            <input type="text" placeholder="0.00 $" require name="preco">
            <input type="submit" value="Adicionar" name="adicionar" id="btn">
        </form>
   </div>
</body>
</html>