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
    <title>Gerir produtos</title>
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
        
        <?php echo "<p><b>Usuario</b>:@{$_SESSION['nome']}<a href=logout.php>Sair</a></p>";?>
       
    </header>

    <div class="container">
        <p>Gerir produtos</p>

        <table>
            <thead>
                 <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Data</th>
                <th>Actualizar</th>
                <th>Remover</th>
            </tr>
            </thead>
           <tbody>
            <?php
                
                include "conexao.php";

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
                        echo "<td><a href=actualizar.php?id={$result['id']}>Actualizar</a></td>";
                        echo "<td><a href='remover.php?id={$result['id']}'onclick='return confirmarRemocao()'>Remover</a></td>";
                        echo "</tr>";
                    }
                }else{
                    echo "Nenhum produto disponivel";
                }
            
            ?>
           </tbody>
        </table>
        <div class="btn">
            <a href="Produtos.php"><button>Voltar</button></a>
        </div>
    </div>
    <script>
        function confirmarRemocao(){
    return confirm("Tem certeza que deseja remover o produto?");
}
    </script>
</body>
</html>