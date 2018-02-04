
<?php
$login = "";
$senha = "";
		// session_start inicia a sessão
		@session_start();
		// as variáveis login e senha recebem os dados digitados na página anterior
		$login = $_POST['txt_login'];
		$senha = $_POST['txt_senha'];
		include_once('conectar_banco.php');


		// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
		$result = mysql_query("SELECT * FROM `tbl_usuario` WHERE `email_usuario` = '$login' AND `senha_usuario`= '$senha'");

		if(mysql_num_rows ($result) > 0 )
		{
		  session_start();
			$_SESSION['id_usuario'] = $id_usuario;
			$_SESSION['nome_usuario'] = $nome_usuario;
			$_SESSION['senha_usuario'] = $senha_usuario;

			if($rsconsulta=mysql_fetch_array($result)){
				$nome_usuario=$rsconsulta['nome_usuario'];
				$id_usuario=$rsconsulta['id_usuario'];

				$_SESSION['nome_usuario'] = $nome_usuario;
				$_SESSION['id_usuario'] = $id_usuario;
				header("location:../perfilUsuario.php?id_usuario=".$id_usuario);

		 }
	 }else{
?>
		  <script>

			 	window.alert('Usuário ou senha incorretos(a)!');
			 	header('location:../home.php');

	 		</script>
<?php

		echo "<meta http-equiv='refresh' content='0.1;URL=../home.php'>";
		echo "Redirect...";

	 }
?>
