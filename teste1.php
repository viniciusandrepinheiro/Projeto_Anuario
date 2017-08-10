<?php 
require_once("conexao.php");
require_once("cabecalho.php")
?>

<form method="post" action="teste2.php">
<?php
if(isset($_SESSION["id"])){
		if($_SESSION["id"]==1){
			echo "<p class='erro'>Campos em branco</p>";
			}
		elseif($_SESSION["id"]==7){
			echo "<p class='sucesso'>Alteração feita com sucesso !</p>";
			}
		elseif($_SESSION["id"]==9){
			echo "<p class='erro'>Email não disponivel !</p>";
			}
			
		}
	unset($_SESSION["id"]);//FINALIZANDO VARIÁVEL DE SESSÃO com o comando "UNSET";
	?>

<fieldset>

<label>Nome atual: <?=$_SESSION['usuario']?></label>
               <p></p>
  <label>Novo nome:</label>
  <input type="text" name="novo_nome"/>
  <input type="submit" name="alterar_nome" value="Enviar"/> 
         	<p></p>    
</fieldset>
<label>Email atual: <?=$_SESSION['email']?></label>
               <p></p>
  <label>Novo email:</label>
  <input type="text" name="novo_email"/>
           <input type="submit" name="alterar_email" value="Enviar"/>     
</fieldset>


</form>
</body>
</html>


