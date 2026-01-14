<?php
session_start();

if(!$_SESSION['nome']){
    header("Location: index.php");
    }
    else{
        include "conexao.php";

        if(isset($_GET['id'])){
            $identificador=$_GET['id'];
            
            $lista="SELECT*FROM produto WHERE id=$identificador";
            $exe=mysqli_query($conn,$lista);
            if(mysqli_num_rows($exe)>0){

            $result=mysqli_fetch_assoc($exe);
            $nomeInput=$result['nome'];
            $descricaoInput=$result['descricao'];
            $precoInput=$result['preco'];

                if($_SERVER['REQUEST_METHOD']=="POST"){
                    if(isset($_POST['updt'])){
                        $nome=$_POST['nome'];
                        $descricao=$_POST['descricao'];
                        $preco=$_POST['preco'];
                        $data=date("Y/m/d");
            
                        $sql="UPDATE produto SET nome='$nome',descricao='$descricao',preco=$preco,data='$data' WHERE id=$identificador";

                        if(mysqli_query($conn,$sql)){
                            displayMessage("Produto actualizado com sucesso");  
                            header("Location: gerir.php");
                        }
            
                    }

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
    <title>Actualizar Produto</title>
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
        <p>Actualizar produto</p>
        <form action="actualizar.php?id=<?php echo $identificador;?>" method="post">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Nome do produto" name="nome" value="<?php echo $nomeInput?>" require>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" value="<?php echo $descricaoInput?>" require>
            <label for="preco">Preço</label>
            <input type="text" placeholder="0.00 $" value="<?php echo $precoInput?>" require name="preco">
            <input type="submit" value="Actualizar" name="updt" id="btn">

             <div class="btn1" >
            <button><a href="gerir.php">Cancelar</a></button>
        </div>
        </form>
       
   </div>
   <script>
    function confirmarRemocao(){
    return confirm("Tem certeza que deseja remover o produto?");
}
   </script>
</body>
</html>