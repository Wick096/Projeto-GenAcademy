<html lang = "pt-br">

	<head>

		<title>GenAcademy</title>

		<meta charset="utf-8">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		 <link rel="stylesheet" type="text/css" href="./style/style_pages.css">

	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">

	      <div class="collapse navbar-collapse" >

	        <ul class="navbar-nav mr-auto">

	          <li class="nav-item">
	            <a class="nav-link" href="index.html">Menu Principal</a>
	          </li>

	          <li class="nav-item ">
	            <a class="nav-link" href="criarDisciplina.html">Criar Disciplina</a>
	          </li>

	          <li class="nav-item active">
	            <a class="nav-link" href="alterar.php">Alterar Disciplina</a>
	          </li>

	          <li class="nav-item">
	            <a class="nav-link" href="listar_todas.php">Listar todas as Disciplinas</a>
	          </li>

	          <li class="nav-item">
	            <a class="nav-link" href="listar.html">Listar uma Disciplina</a>
	          </li>

	          <li class="nav-item">
	            <a class="nav-link" href="apagar.php">Remover Disciplina</a>
	          </li>

	        </ul>

	      </div>

	    </nav>

		<div id="content" class="mx-auto">

	        <form class="form-row" method="POST" action="" style="margin-bottom: 85px;">

				

		          <div class="col-sm-12">
		            <label for="nome">Nome</label>
		            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o novo nome da disciplina (Ir?? Substituir o atual nome!)">
		          </div>

		          <div class="col-sm-12">
		            <label for="num">ID da disciplina</label>
		            <input type="number" class="form-control" id="num" name="num" placeholder="Insira o ID da disciplina que voc?? deseja alterar">
		          </div>

		          <div class="col-sm-12">
		            <label for="idPreReque">Pr?? requisito</label>
		            <input type="number" class="form-control  " id="idPreReque" name="idPreReque" placeholder="Insira o ID do pre requisito">
		          </div>

		          <div class="col-sm-12">
		            <label for="periodo">Per??odo</label>
		            <input type="number" class="form-control periodo" id="periodo" name="periodo" placeholder="Insira o per??odo">
		          </div>

		          <div class="col-sm-12">
		            <label for="cred">Creditos</label>
		            <input type="number" class="form-control creditos" id="cred" name="cred" placeholder="Insira a quantidade de creditos">
		          </div>

		          <div class="form-group col-md-12">
		              <button class="btn btn-primary" type="submit" name="Alterar">Alterar</button>
		          </div>

		      </form>

	    </div>

	</body>

</html>

<?php

if(isset($_POST["Alterar"])){

    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $nomeBanco = "av1_3daw";

    $nome = $_POST['nome'];
    $id = $_POST['num'];
    $periodo = $_POST['periodo'];
    $idPreReque = $_POST['idPreReque'];
    $creditos = $_POST['cred'];


    $conn = mysqli_connect($servidor, $usuario, $senha, $nomeBanco);

    if(!$conn) {
        die("Erro de conex??o com localhost, o seguinte erro ocorreu ->".mysql_error());
    }


    $query =  "SELECT * FROM disciplina WHERE id='$id'";

     $result = $conn->query($query);

     if ($result->num_rows > 0){
        $up = "UPDATE disciplina SET nome = '$nome', periodo = '$periodo', idPreReque = '$idPreReque', cred = '$creditos' WHERE id = '$id'";

        if ($conn->query($up) === TRUE) {

            echo "<script>alert('Disciplina alterada com sucesso'); location= 'listar_todas.php';</script>";
    
        } else {
    
            die("Erro!");
    
        }

     } 

} 

?>

