<?php
include 'conexao.php';
$connect = conexao();

if(isset($_POST["txtTitulo"])){
$titulo = $_POST["txtTitulo"];
}
if(isset($_POST["txtDescricao"])){
$descricao = $_POST["txtDescricao"];
}
if(isset($_POST["txtQuantidade"])){
$quantidade =(int)$_POST["txtQuantidade"];
}
if(isset($_POST["txtISBN"])){
$isbn = $_POST["txtISBN"];
}
?>

<html>
	<head>
		<link rel="stylesheet" href="css/960.css" type="text/css">
		<link rel="stylesheet" href="css/style.css" type="text/css">
		<meta charset="UTF-8">
	</head>

	<body>

		<div id="total" class="container_16">

			<div id="banner" class="grid_12">
                            <img src="imagens/livro.png" height="200" width="200" align="left">
                            <h1 style="color: #fe6c00; font-family: Gill Sans, sans-serif; font-size: 70px">Projeto Livro</h1>
			</div>

			<div id="login" class="grid_4">
				<h2></h2>
			</div>

			<div id="menu" class="grid_4">

				<ul><b>
                                    <li><a href="livros.php">Livros</a></li>
                                        <ul>
                                            <li><a href="livroCadastro.php">Novo livro</a></li>
                                            <li><a href="livro_genCadastro.php">
                                                    Adicionar genero a um livro</a></li>
                                            <li><a href="livroLocacao.php">Locacao</a></li>
                                            <li><a href="livroDevolucao.php">Devoluçao</a></li>
                                        </ul>
                                    </li>
                                    <b>
                                    <li><a href="autores.php">Autores</a></li>
                                    <li><a href="generos.php">Generos</a></li>
                                    
				</b></ul>

			</div>

			<div id="conteudo" class="grid_12">
                            <img src="imagens/livro.png" height="200" width="200" align="right">
                            <h2>Novo Livro</h2>
                            <form method="post">
                                <h4>Titulo: <input type="text" name="txtTitulo" size="10" ><br><br></li>
                                Descriçao: <input type="text" name="txtDescricao" size="10" ><br><br></li>
                                Quantidade: <input type="text" name="txtQuantidade" size="3" ><br><br></li>
                                ISBN-10: <input type="text" name="txtISBN" size="10" ><br><br></li>
                                Autor: <select name="autor">
                                    <?php
                                    $sqlAutor = "SELECT * FROM autor";
                                    $result = mysqli_query($connect,$sqlAutor);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $autorId = $row["id"];
                                        echo "<option name='autor[]' value='$autorId'>" . $row["nome"];
                                    }

                                    ?>
                                </select> 
                                <br>
                                <br>
                                <input type="submit" name="btnCadastro" value="Cadastrar"/>
                            </form>
                            <?php
                            if(isset($_POST['autor'])){
                                $autorId = $_POST['autor'];
                            }
                            if(isset($titulo) != NULL){
                                $sqlCadastro = "INSERT INTO livro (titulo, descricao, quantidade, isbn, autor_id)"
                                        . " VALUES ('$titulo','$descricao','$quantidade','$isbn','$autorId')";
                                $insert = mysqli_query($connect,$sqlCadastro);
                                if($insert){
                                    echo "<br><br>Cadastro efetuado com sucesso!";
                                }else{
                                    echo "<br><br>ERRO --- Cadastro não efetuado! " . mysqli_error($connect);
                                }
                            }

                            ?>
			</div>

			<div id="rodape" class="grid_16">
                            <h5>Criado por: Giovanna Cazelato Pires</h5>
                            <br><br>
                            <h5>e-mail: giovannacpires@outlook.com</h5>
			</div>

		</div>
	</body>

</html>
<?php
mysqli_close($connect);
?>

