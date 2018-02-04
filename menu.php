<div id="principal_header">
<nav>
  <a href="home.php">
    <div id="logo">
        <img id="img_logo_principal" src="imagens/td.png" alt="TourDreams">
    </div>
  </a>
    <script type="text/javascript">
              $(document).ready(function() {

                  $(".menu_busca_sel").click(EsconderMensagem);

                  });
              function EsconderMensagem(){
                  $(".menu_busca").hide();
              }

          </script>
    <div id="principal_menu">

              <?php include('principalMenu.php') ?>
    </div>

</nav>

<nav id="nav_responsivo">
	<div id="menuu">
		<ul class="lstmenu_mobile">
      <img class="menu_img"src="imagens/icon_menu.png">
			<li>
				<ul class="lstmenu">
					<table>
						<tr><td>&nbsp;&nbsp; </td></tr>
            <tr><td>&nbsp;&nbsp; </td></tr>
						<tr><td><li><a href="avancada.php" style="color:#000;">&nbsp;Busca avançada</a></li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
						<tr><td><li><a href="parceiros.php" style="color:#000;">&nbsp;Hoteleiros </a></li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
						<tr><td><li><a href="conhecaDestino.php" style="color:#000;">&nbsp;Conheça seu destino </a></li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
						<tr><td><li><a href="melhoresDestinos.php" style="color:#000;">&nbsp;Melhores destinos </a></li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
						<tr><td><li><a href="promocao.php" style="color:#000;">&nbsp;Promoções </a></li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
						<tr><td><li><a href="sobre.php" style="color:#000;">&nbsp;Sobre </a> </li></tr></td>
            <tr><td>&nbsp;______________________ </td></tr>
            <tr><td><li><a href="login_responsivo_opt.php" style="color:#000;">&nbsp;Login </a> </li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
            <tr><td><li><a href="optCadastro.php" style="color:#000;">&nbsp;Cadastro </a> </li></tr></td>
            <tr><td>&nbsp;&nbsp; </td></tr>
					</table>
				</ul>
			<li>
		</ul>
	</div>
</nav>

</div>

  <div id="header_escondida">
    <nav id="nav_dois">

    <div id="logo_escondida">
        <a href="home.php"><img id="img_logo_principal_escondida" src="imagens/td_escondida.png" alt="TourDreams"></a>
    </div>
      <?php include('principalMenu.php') ?>
    </nav>
  </div>
