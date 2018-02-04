<?php

  $id_hotel="";
  $login = "";
  $senha = "";
  		// session_start inicia a sessão
  		@session_start();
  		// as variáveis login e senha recebem os dados digitados na página anterior
  		$login = $_POST['txtEmail_hotel'];
  		$senha = $_POST['txtSenha_hotel'];
  		include_once('conectar_banco.php');


  		// A variavel $result pega as varias $login e $senha, faz uma pesquisa na tabela de usuarios
  		$result = mysql_query("SELECT * FROM `tbl_hotel` WHERE `email_hotel` = '$login' AND `senha_hotel`= '$senha'");

  		if(mysql_num_rows ($result) > 0 )
  		{
  		session_start();

      $_SESSION['id_hotel'] = $id_hotel;

  		$_SESSION['email_hotel'] = $login;
  		$_SESSION['senha_hotel'] = $senha;

  		if($rsconsulta=mysql_fetch_array($result)){
  			//RESGATA OS DADOS DO BANCO DE DADOS E GUARDA EM VARIAVEIS
  			$nome=$rsconsulta['nome_hotel'];
  			$id_hotel=$rsconsulta['id_hotel'];

  			$_SESSION['nome_hotel'] = $nome;
  			$_SESSION['id_hotel'] = $id_hotel;

  			header("location:../perfilParceiro.php?id_hotel=".$id_hotel);

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
