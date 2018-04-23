<?php

include 'conexao.php';
$connect = conexao();


$sql = "SELECT * FROM autor";
$result = mysqli_query($connect,$sql);
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

				<ul>
					<b>
					<li><a href="livros.php">Livros</a></li>
					<li><a href="autores.php">Autores</a></li>
                                        </b>
                                        <ul>
                                            <li><a href="autorCadastro.php">Novo autor</a></li>
                                        </ul></li>
                                        <b>
                                        <li><a href="generos.php">Generos</a></li>
					</b>
				</ul>

			</div>

			<div id="conteudo" class="grid_12">
                            <img src="imagens/livro.png" height="200" width="200" align="right">
                            <h2>Autores</h2>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<table border=2><td>";
                            echo "<b>Nome = " . $row["nome"]. "</b><br>";
                            echo "Livros publicados:  <br>";
                            $autorId = (int)$row["id"];
                            $sqlLivro = "SELECT titulo FROM livro WHERE autor_id = '$autorId'";
                            $resulLivro = mysqli_query($connect,$sqlLivro);
                                while($livro = mysqli_fetch_assoc($resulLivro)){
                                    echo "Titulo = " . $livro["titulo"] . "<br>";
                                }
                            echo "</td><br>";
                            }
                            ?></table>
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


