<?php
    $servername="localhost";
    $username="root";
    $password="";
    $db="gestaodeprodutos";

    $conn=mysqli_connect($servername,$username,$password,$db);

    function displayMessage($texto,$style="text-align:center;color:gray"){
        echo "<div style={$style}>$texto</div>";
    }
?>
