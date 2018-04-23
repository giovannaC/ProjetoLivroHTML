<?php
function conexao(){
    $connect = mysqli_connect('localhost','root','Ginha9201','projeto_livro');
    if (mysqli_connect_errno())
    {
     echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    return $connect;
}
?>
 