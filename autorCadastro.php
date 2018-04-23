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
                                </b>
                                        <ul>
                                            <li><a href="autorCadastro.php">Novo autor</a></li>
                                        </ul></li>
                                <b>
                                    <li><a href="generos.php">Generos</a></li>
				</b></ul>

			</div>

			<div id="conteudo" class="grid_12">
                        <img src="imagens/livro.png" height="200" width="200" align="right">
                            <h2>Novo autor</h2>
                                <form method="post">
                                    <h4>Nome do autor: <input type="text" name="txtNome" size="10" ></li>
                                    <input type="submit" name="btnCadastro" value="Cadastrar"/>
                                </form>
                                <?php
                                if(isset($nome) != NULL){
                                    $sqlCadastro = "INSERT INTO autor (nome) VALUES ('$nome')";
                                    $insert = mysqli_query($connect,$sqlCadastro);
                                    if($insert){
                                       echo "Cadastro efetuado com sucesso!";
                                    }else{
                                        echo "ERRO --- Cadastro não efetuado! " . mysqli_error($connect);
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