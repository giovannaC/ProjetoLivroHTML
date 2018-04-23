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
                                        <ul>
                                            <li><a href="livroCadastro.php">Novo livro</a></li>
                                            <li><a href="livro_genCadastro.php">
                                                    Adicionar genero a um livro</a></li>
                                            <li><a href="livroLocacao.php">Locação</a></li>
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
                            <h2>Adicionar Genero ao Livro</h2>
                            <form method="post">
                                <h4>Titulo: <select name="titulo">
                                    <?php
                                    $sqlLivro = "SELECT * FROM livro";
                                    $result = mysqli_query($connect,$sqlLivro);
                                    while($row = mysqli_fetch_assoc($result)){
                                        $livroId = $row["id"];
                                        echo "<option name='livro' value='$livroId'>" . $row["titulo"];
                                    }
                                    if(isset($_POST['titulo'])){
                                        $livroId = $_POST['titulo'];
                                    }
                                    ?>
                                </select> 
                                <br>
                                <br>
                                Generos:<br>
                                <?php
                                $sqlGenero = "SELECT * FROM genero";
                                $resultGenero = mysqli_query($connect,$sqlGenero);
                                while($rowGenero = mysqli_fetch_assoc($resultGenero)){
                                    $generoId = (int)$rowGenero["id"];
                                    echo "<input type='checkbox' name='genero[]' value='$generoId'>" 
                                            . $rowGenero["descricao"] . "<br>";
                                }
                                if(isset($_POST["genero"])){
                                    foreach ($_POST["genero"] as $genero) {
                                        $sqlInserir = "INSERT INTO livro_genero (livro_id,genero_id) "
                                                . "VALUES ('$livroId', '$genero')";
                                        $resultInserir = mysqli_query($connect,$sqlInserir);
                                    }
                                    if($resultInserir){
                                        echo "<br>Genero inserido com sucesso!";
                                    }else{
                                        echo "<br>ERRO --- Genero não inserido! " . mysqli_error($connect);
                                    }
                                }
                                ?>
                                <br>
                                <input type="submit" name="btnInserir" value="Inserir"/>
                            </form>
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
