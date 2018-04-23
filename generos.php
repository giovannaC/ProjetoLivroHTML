<?php
//mysqli_close($connect);
$connect = mysqli_connect('localhost','root','Ginha9201','projeto_livro');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
$sql = "SELECT * FROM genero";
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
                                         <li><a href="autores.php">Autores</a></li>
                                         <li><a href="generos.php">Generos</a></li>
                                         </b>
                                         <ul>
                                            <li><a href="generoCadastro.php">Novo genero</a></li>
                                         </ul>
				</ul>

			</div>

			<div id="conteudo" class="grid_12">
                            <img src="imagens/livro.png" height="200" width="200" align="right">
                            <h2>Livros</h2>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                            echo "<table border=2>";
                            echo "<td><b>Genero = " . $row["descricao"]. "</b><br>";
                            echo "Livros do genero: <br>";
                            $generoId = (int)$row["id"];
                            $sqlLivroId = "SELECT livro_id FROM"
                                    . " livro_genero WHERE genero_id = '$generoId'";
                            $resulLivroId = mysqli_query($connect,$sqlLivroId);
                                while($livro = mysqli_fetch_assoc($resulLivroId)){
                                    $livroId = (int)$livro["livro_id"];
                                    $sqlLivro = "SELECT titulo FROM livro"
                                            . " WHERE id = '$livroId'";
                                    $resultLivro = mysqli_query($connect,$sqlLivro);
                                    $row = mysqli_fetch_assoc($resultLivro);
                                    echo "Titulo = ". $row["titulo"] . "<br>";
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
