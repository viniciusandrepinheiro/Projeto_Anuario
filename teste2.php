<?php 
//ALTERANDO NOME
require_once("cabecalho.php");
require_once("conexao.php");

if(isset($_POST["alterar_nome"])){
$novo_nome = $_POST['novo_nome'];
$_SESSION['usuario'] = $novo_nome;

$consulta = "update  usuario set nome='{$_SESSION['usuario']}' where email='{$_SESSION['email']}'";

	if(empty($_SESSION['usuario'])){
		$_SESSION['id']=1;
		header("location: teste1.php");
		die();
	}
	else{

		$_SESSION['id']=7;
		header("location: teste1.php");
		
		$resultado = mysqli_query($conexao,$consulta);
		die();
	}
}


?>
<?php
require_once("conexao.php");

if(isset($_POST["alterar_email"])){
$novo_email = $_POST['novo_email'];

$consulta = "update  usuario set email='{$novo_email}' where nome='{$_SESSION['usuario']}'";
	
	if(empty($novo_email)){
		$_SESSION['id']=1;
		header("location: teste1.php");
		die();
	}
	
	//FALTA MODFICIAÇÃO DE EMAILLLLLLLLLLLL
	/*elseif(){
		$resultado = filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL);
			if(!$resultado){
					header("location:cadastro_usuario.php");//email inválido
					$_SESSION["id"]=9;
				die();
		}*/
	else{
		$_SESSION['id']=7;
		$_SESSION['email'] = $novo_email;
		header("location: teste1.php");
		$resultado = mysqli_query($conexao,$consulta);
		die();
	}
}

?>
</body>
</html>


