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
                            <h2>Locar um Livro</h2>
                            <form method="post">
                            <h4>Titulo a ser locado: 
                            <input type="text" name="txtTitulo" size="15" ><br><br>

                            <input type="submit" name="btnLocacao" value="Locar">
                            </form>
                            <?php
                            if(isset($_POST["txtTitulo"])){
                                $titulo = $_POST["txtTitulo"];
                                echo "<br><br>Titulo locado: ". $titulo . "<br>";
                                $sqlBusca = "SELECT * FROM livro WHERE titulo = '$titulo'";
                                $result = mysqli_query($connect, $sqlBusca);
                                if($result){
                                    $row = mysqli_fetch_assoc($result);
                                    $livroId = (int)$row["id"];
                                    $quantidade = (int)$row["quantidade"];
                                    echo "Quantidade do livro: ". $quantidade . "<br>";
                                }else{
                                    echo "<br>ERRO --- " . mysqli_error($connect);
                                }

                                $sqlIf = "SELECT * FROM locado WHERE livro_id = '$livroId'";
                                $resultIf = mysqli_query($connect,$sqlIf);
                                    if($resultIf && mysqli_num_rows($resultIf) > 0){
                                        $rowIf = mysqli_fetch_assoc($resultIf);
                                        $quantidade_dispo = (int)$rowIf["quantidade_dispo"];
                                        if($quantidade_dispo - 1 >= 0){
                                            $quantidade_dispo = $quantidade_dispo - 1;
                                            echo "Quantidade disponivel: " . $quantidade_dispo . "<br>";
                                            $sqlReplace = "REPLACE INTO locado "
                                                . "VALUES ('$livroId','$quantidade_dispo')";
                                            $resultReplace = mysqli_query($connect,$sqlReplace);
                                                if($resultReplace){
                                                    echo "<br>Locação efetuada com sucesso!! <br>";
                                                }else{
                                                    echo "<br>ERRO --- " . mysqli_error($connect);
                                                }
                                        }else{
                                            echo "Não há mais livros disponiveis <br>";
                                            echo "<table border>";
                                            echo "<td><b>Titulo = " . $row["titulo"]. "</b><br>";
                                            echo "Descriçao = " . $row["descricao"] . "<br>";
                                            echo "Quantidade = " . $row["quantidade"] . "<br>";
                                            echo "ISBN-10 = " . $row["isbn"] . "<br>";
                                            $autorId = (int)$row["autor_id"];
                                            $sqlAutor = "SELECT nome FROM autor WHERE id = '$autorId'";
                                            $resulAutor = mysqli_query($connect,$sqlAutor);
                                            $autor = mysqli_fetch_array($resulAutor);
                                            echo "Autor = " . $autor["nome"] . "<br></td><br></table>";
                                        }
                                    }else{
                                        $quantidade_dispo = ((int)$quantidade) - 1;
                                        echo "Quantidade disponivel: " . $quantidade_dispo . "<br>";
                                        $sqlElse = "REPLACE INTO locado"
                                            . " VALUES ('$livroId','$quantidade_dispo')";
                                        $resultElse = mysqli_query($connect,$sqlElse);
                                        if($resultElse){
                                            echo "<br>Locação efetuada com seucesso!! <br>";
                                        }else{
                                            echo "<br>ERRO --- " . mysqli_error($connect);
                                        }
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


