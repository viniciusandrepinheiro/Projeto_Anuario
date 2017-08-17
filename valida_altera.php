<?php 
require_once("cabecalho.php");

if(isset($_POST["alterar_email"])){

$_SESSION['email'] = $_POST['email'];

$sql = mysqli_query($conexao,"select * from usuario where email='{$_SESSION['email']}'");
	
	if(mysqli_num_rows($sql)>=1){
	header("Location:altera.php");
	$_SESSION['id']=10;
	die();
	
	}
	
	
	

elseif(empty($_SESSION['email'])){
				header("Location:altera.php");
					$_SESSION["id"]=1;
				die();
	
	}
	
	elseif($_SESSION['email'] == $_POST['email']){
		$resultado = filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL);
			if(!$resultado){
					header("Location:altera.php");//email inválido
					$_SESSION["id"]=8;
				die();
			}

				else{
				$altera = "update usuario SET email='{$_SESSION['email']}' where id=".($_SESSION['ident']);
				$_SESSION['id']=7;
				$resultado_altera = mysqli_query($conexao,$altera);
				header("location: altera.php");
				die();
						
						}
			
		}
		
		
		

	
}


if(isset($_POST["alterar_nacionalidade"])){

	if(empty($_POST['nova_nacionalidade'])){
				header("Location:altera.php");
					$_SESSION["id"]=1;
				die();
	
	}
		$_SESSION['nacionalidade'] = utf8_decode(ucwords($_POST['nova_nacionalidade']));
		$_SESSION['nacionalidade'] = strip_tags($_SESSION['nacionalidade']);

		$altera = "update usuario SET nacionalidade='{$_SESSION['nacionalidade']}' where id=".($_SESSION['ident']);
		$_SESSION['id']=7;
		header("location: altera.php");
		
		$resultado_altera = mysqli_query($conexao,$altera);
		die();

}

if(isset($_POST["alterar_endereco"])){
	
	if(empty($_POST['novo_endereco'])){
				header("Location:altera.php");
					$_SESSION["id"]=1;
				die();
	
	}
		else{
		$_SESSION['endereco'] = utf8_decode(ucwords( $_POST['novo_endereco']));
		$_SESSION['endereco'] = strip_tags($_SESSION['endereco']);
	
		$altera = "update usuario SET endereco='{$_SESSION['endereco']}' where id=".($_SESSION['ident']);
		$_SESSION['id']=7;
		header("location: altera.php");
		$resultado_altera = mysqli_query($conexao,$altera);
		die();
		}
}

if(isset($_POST["alterar_cep"])){
	
	if(empty($_POST['novo_cep'])){
				header("Location:altera.php");
					$_SESSION["id"]=1;
				die();
	
	}
		$_SESSION['cep'] = $_POST['novo_cep'];
		$_SESSION['cep'] = strip_tags($_SESSION['cep']);

		$altera = "update usuario SET cep='{$_SESSION['cep']}' where id=".($_SESSION['ident']);
		$_SESSION['id']=7;
		header("location: altera.php");
		$resultado_altera = mysqli_query($conexao,$altera);
		die();

}

if(isset($_POST["alterar_telefone"])){

		if(empty($_POST['novo_telefone'])){
				header("Location:altera.php");
					$_SESSION["id"]=1;
				die();
	
	}
	else{
		$_SESSION['telefone'] = $_POST['novo_telefone'];
		$_SESSION['telefone'] = strip_tags($_SESSION['telefone']);

		$altera = "update usuario SET telefone='{$_SESSION['telefone']}' where id=".($_SESSION['ident']);
		$_SESSION['id']=7;
		header("location: altera.php");
		$resultado_altera = mysqli_query($conexao,$altera);
		die();
	}
}
	

?>
</body>
</html>


