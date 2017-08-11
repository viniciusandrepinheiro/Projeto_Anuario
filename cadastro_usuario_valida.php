<?php
require_once "conexao.php";

$_SESSION['usuario'] = $_POST['u'];
$_SESSION['senha'] = $_POST['s'];

$_SESSION['email'] = $_POST['email'];
$_SESSION['nacionalidade'] = $_POST['nacionalidade'];
$_SESSION['endereco'] = $_POST['endereco'];
$_SESSION['cep'] = $_POST['cep'];
$_SESSION['telefone'] = $_POST['telefone'];


$_SESSION['usuario']= strtolower($_SESSION['usuario']);//retorna string em minúscula
$_SESSION['usuario']= trim($_SESSION['usuario']);
$_SESSION['usuario'] = strip_tags($_SESSION['usuario']);
$_SESSION['usuario']= str_replace(array("'","\""),"",$_SESSION['usuario']);//retirar aspas simples e 
$_SESSION['senha'] = md5($_POST['s']);	
	
	//VALIDANDO EMAIL
	if($_SESSION['email'] = $_POST['email']){
		$resultado = filter_var($_SESSION['email'],FILTER_VALIDATE_EMAIL);
			if(!$resultado){
					header("location:cadastro_usuario.php?id=8");//email inválido
					$_SESSION["id"]=8;
				die();
			}
	}
	
	$sql = mysqli_query($conexao,"select * from usuario where email='{$_SESSION['email']}'");
	if(mysqli_num_rows($sql)>=1){
	header("location: cadastro_usuario.php");
	$_SESSION['id']=10;
	die();

}

elseif(empty($_SESSION['usuario'])|| empty($_SESSION['senha']) || empty($_SESSION['email']) || empty($_SESSION['nacionalidade']) || empty($_SESSION['endereco']) || empty($_SESSION['cep']) || empty($_SESSION['telefone'])){
		
		var_dump($consulta);
		$_SESSION['id']=1;
		header("location: cadastro_usuario.php");
		die();
		}
	
else{
$insere = "insert into usuario (id,nome,senha,email,nacionalidade,endereco,cep,telefone)values('','{$_SESSION['usuario']}','{$_SESSION['senha']}','{$_SESSION['email']}','{$_SESSION['nacionalidade']}','{$_SESSION['endereco']}','{$_SESSION['cep']}','{$_SESSION['telefone']}')";
	
 $consulta = mysqli_query($conexao,$insere); 
	 
header("location:cadastro_usuario.php");

$_SESSION["id"]=9;

die();
}
	

	
	mysqli_close($conexao);
