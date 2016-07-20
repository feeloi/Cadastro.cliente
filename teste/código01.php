<?php include ('INC_CONN.php');?>
<html>
<head>
	<script type="text/javascript">
		function lista(){
			document.getElementById("id").value = document.getElementById("tid").innerHTML;
			document.getElementById("nome").value = document.getElementById("tnome").innerHTML;
			document.getElementById("email").value = document.getElementById("temail").innerHTML;
			document.getElementById("tel").value = document.getElementById("ttel").innerHTML;
			document.getElementById("senha").value = document.getElementById("tsenha").innerHTML;
		}
	</script>

<title>Principal</title>
</head>
<body>
<center>
	<form name="cadastro" method="POST" action="cadastro.php">
		ID<input type="text" name="id" id="id">
		NOME<input type="text" name="nome" id="nome" >
		EMAIL<input type="text" name="email" id="email">
		TELEFONE<input type="text" name="tel" id="tel">
		SENHA<input type="password" name="senha" id="senha"><BR>
		<input type="submit" name="INCLUIR" VALUE="INCLUIR">
		<input type="submit" name="ALTERAR" VALUE="ALTERAR">
		<input type="submit" name="LISTAR" VALUE="LISTAR">
		<input type="submit" name="DELETAR" VALUE="DELETE">
	</form>

<table border='1'>
		<tr>
			<th>ID</th>
			<th>NOME</th>
			<th>EMAIL</th>
			<th>TEL</th>
			<th>SENHA</th>
			
		</tr>
<?php 
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	$senha = $_POST['senha'];

	if(isset($_POST['ALTERAR'])){
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$senha = $_POST['senha'];
		$sql = "UPDATE TB_EMP set NM_FUN='".$nome."', EMAIL_FUN='".$email."', TEL_FUN='".$tel."',PW_FUN='".$senha."' WHERE CD_FUN = ".$id;
 		mysql_query($sql,  $conn);
	}
	if(isset($_POST['DELETAR'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM TB_EMP WHERE CD_FUN = ".$id;
		echo $sql;
 		mysql_query($sql,  $conn);
	}
	if(isset($_POST['INCLUIR'])){
		$sql = "insert into TB_EMP(NM_FUN, EMAIL_FUN, TEL_FUN, PW_FUN) values('". $nome ."', '". $email ."', '". $tel ."', '". $senha."')";
 		mysql_query($sql,  $conn);
	}


	if(isset($_POST['LISTAR'])){
		$sql = "SELECT * FROM TB_EMP";
		$result = mysql_query($sql,  $conn);
		while($row=mysql_fetch_array($result)){

		$id = $row['CD_FUN'];
		$nome = $row['NM_FUN'];
		$email = $row['EMAIL_FUN'];
		$tel = $row['TEL_FUN'];
		$senha = $row['PW_FUN'];

?>
	
	
		<tr onclick="lista()">
			<td id="tid"><?php echo $id; ?></td>
			<td id="tnome"><?php echo $nome; ?></td>
			<td id="temail"><?php echo $email; ?></td>
			<td id="ttel"><?php echo $tel; ?></td>
			<td id="tsenha"><?php echo $senha; ?></td>
			
		</tr>
<?php }} ?>		
</table>

</center>
</body>
</html>
