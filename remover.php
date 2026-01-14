<?php
    session_start();
    if(!$_SESSION['nome']){
          header("Location: index.php");
    }

    include "conexao.php";
        if(isset($_GET['id'])){
            $id=$_GET['id'];

            $sql="DELETE FROM produto WHERE id=$id";
            if(mysqli_query($conn,$sql)){
                displayMessage("Produto removido com sucesso");
                header("Location: gerir.php");
            }
        }
    

?>