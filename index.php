<?php

    include "conexao.php";
    session_start();
    if(isset($_POST['login'])){

        $nome=$_POST['nome'];
        $senha=$_POST['senha'];

        $sql="SELECT * FROM `usuario` WHERE nome='$nome' AND senha='$senha'";
        $exe=mysqli_query($conn,$sql);
        
        if(mysqli_num_rows($exe)==1){
            $_SESSION['nome']=$nome;
            header("Location: home.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./Style/index.css">
</head>
<body>
    <div class="container">
            <p>Login</p>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <label for="nome">Usuario</label>
                <input type="text" name="nome" id="nome" require>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" require>
                <input type="submit" value="Entrar" name="login" id="login">
            </form>
    </div>
</body>
</html>
