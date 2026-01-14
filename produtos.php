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
    <title>Produtos disponiveis</title>
    <link rel="stylesheet" href="./Style/produto.css">
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
        <p>Produtos</p>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" placeholder="Produto" name="pesquisa">
                <button name="pesquisar">Pesquisar</button>
        </form>
        <table>
            <thead>
                <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Data</th>
                </tr>
            </thead>
           <tbody>
            <?php
                
                include "conexao.php";
                if($_SERVER['REQUEST_METHOD']=="POST"){
                    if(isset($_POST['pesquisar'])){
                        $nome=$_POST['pesquisa'];
                         $sql="SELECT * FROM produto WHERE nome LIKE'%$nome%'";
                         $exe=mysqli_query($conn,$sql);
                            if(mysqli_num_rows($exe)>0){
                                while($result=mysqli_fetch_assoc($exe)){
                                    echo "<tr>";
                                    echo "<td>{$result['id']}</td>";
                                    echo "<td>{$result['nome']}</td>";
                                    echo "<td>{$result['descricao']}</td>";
                                    echo "<td>{$result['preco']}.00 MT </td>";
                                    echo "<td>{$result['data']}</td>";
                                    echo "</tr>";
                                }
                            }else{
                                displayMessage("Nenhum produto disponivel");
                            }
                    }
                }else{
                    $sql="SELECT * FROM produto";
                    $exe=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($exe)>0){
                    while($result=mysqli_fetch_assoc($exe)){
                        echo "<tr>";
                        echo "<td>{$result['id']}</td>";
                        echo "<td>{$result['nome']}</td>";
                        echo "<td>{$result['descricao']}</td>";
                        echo "<td>{$result['preco']}.00 MT </td>";
                        echo "<td>{$result['data']}</td>";
                        echo "</tr>";
                    }
                }else{
                    displayMessage("Nenhum produto disponivel");
                }
                }
            
            ?>
           </tbody>
        </table>
        <div class="btn">
            <a href="gerir.php"><button>Gerir produtos</button></a>
        </div>
    </div>
</body>
</html>