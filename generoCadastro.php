<?php
include 'conexao.php';
$connect = conexao();
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
                                    <li><a href="autores.php">Autores</a></li>
                                    <li><a href="generos.php">Generos</a></li>
                                    </b>
                                        <ul>
                                            <li><a href="generoCadastro.php">Novo genero</a></li>
                                        </ul></li>
                                    <b>
				</b></ul>

			</div>

			<div id="conteudo" class="grid_12">
                            <img src="imagens/livro.png" height="200" width="200" align="right">
                            <h2>Novo autor</h2>
                            <form method="post">
                                <h4>Novo genero: <input type="text" name="txtGenero" size="10" ></li>
                                    <br><br>
                                <input type="submit" name="btnCadastro" value="Cadastrar"/>
                            </form>
                            <?php
                            if(isset($_POST["txtGenero"])){
                                $descricao = $_POST["txtGenero"];
                                $sqlCadastro = "INSERT INTO genero (descricao) VALUES ('$descricao')";
                                $insert = mysqli_query($connect,$sqlCadastro);
                                if($insert){
                                   echo "<br><br>Cadastro efetuado com sucesso!";
                                }else{
                                    echo "<br>ERRO --- Cadastro não efetuado! " . mysqli_error($connect);
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

