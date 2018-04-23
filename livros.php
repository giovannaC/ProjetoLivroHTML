<?php
//mysqli_close($connect);
$connect = mysqli_connect('localhost','root','Ginha9201','projeto_livro');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql = "SELECT * FROM livro";
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
                                        <li><a href="livros.php">Livros</a>
                                        </b>
                                        <ul>
                                            <li><a href="livroCadastro.php">Novo livro</a></li>
                                            <li><a href="livro_genCadastro.php">
                                                    Adicionar genero a um livro</a></li>
                                            <li><a href="livroLocacao.php">Locação</a></li>
                                            <li><a href="livroDevolucao.php">Devoluçao</a></li>
                                        </ul></li>
                                        <b>
                                        <li><a href="autores.php">Autores</a></li>
                                        <li><a href="generos.php">Generos</a></li>
					</b>
				</ul>

			</div>

			<div id="conteudo" class="grid_12">
                            <img src="imagens/livro.png" height="200" width="200" align="right">
                            <h2>Livros</h2>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<table border=2>";
                            echo "<td><b>Titulo = " . $row["titulo"]. "</b><br>";
                            echo "Descriçao = " . $row["descricao"] . "<br>";
                            echo "Quantidade = " . $row["quantidade"] . "<br>";
                            echo "ISBN-10 = " . $row["isbn"] . "<br>";
                            $autorId = (int)$row["autor_id"];
                            $sqlAutor = "SELECT nome FROM autor WHERE id = '$autorId'";
                            $resulAutor = mysqli_query($connect,$sqlAutor);
                            $autor = mysqli_fetch_array($resulAutor);
                            echo "Autor = " . $autor["nome"] . "<br></td><br>";
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


