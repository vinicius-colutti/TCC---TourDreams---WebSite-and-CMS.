
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
		$_SESSION['email_usuario'] = $login;
		$_SESSION['senha_usuario'] = $senha;
		if($rsconsulta=mysql_fetch_array($result)){
			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS
			$nome=$rsconsulta['nome_usuario'];
			$idUsuario=$rsconsulta['id_usuario'];
			$foto=$rsconsulta['foto_usuario'];
			$_SESSION['nome_usuario'] = $nome;
			$_SESSION['id_usuario'] = $idUsuario;
			$_SESSION['foto_usuario'] = $foto;

			header('location:../home.php?logado=ON');

		}


		}
		else{
			?>
				<script>

				window.alert('Usuário ou senha incorretos(a)!');
				header('location:../home.php');

				</script>

			<?php
			//FAZ UM REFRESH NA PAG
			echo "<meta http-equiv='refresh' content='0.1;URL=../home.php'>";
			echo "Redirect...";

			}


?>
