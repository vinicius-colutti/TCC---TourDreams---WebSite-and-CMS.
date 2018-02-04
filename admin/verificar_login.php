
<?php
		// session_start inicia a sessão
		@session_start();
		// as variáveis login e senha recebem os dados digitados na página anterior
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		include_once('conectar_banco.php');


		// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
		$result = mysql_query("SELECT * FROM `tbl_funcionarios` WHERE `email_funcionario` = '$login' AND `senha`= '$senha'");

		if(mysql_num_rows ($result) > 0 )
		{
		$_SESSION['login'] = $login;
		$_SESSION['senha'] = $senha;
		if($rsconsulta=mysql_fetch_array($result)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS
			$nome=$rsconsulta['nome_funcionario'];
			$idNivel=$rsconsulta['id_setor'];
			$idUsuario=$rsconsulta['id_funcionario'];
			$_SESSION['nome_funcionario'] = $nome;
			$_SESSION['id_funcionario'] = $idUsuario;
			$_SESSION['id_setor'] = $idNivel;
			header('location:cms/index.php?idNivel='.$idNivel.'');

		}


		}
		else{
			?>
				<script>

				window.alert('Usuário ou senha incorretos(a)!');
				header('location:index.php');

				</script>

			<?php
			//FAZ UM REFRESH NA PAG
			echo "<meta http-equiv='refresh' content='1;URL=index.php'>";
			echo "Redirect...";

			}

?>
