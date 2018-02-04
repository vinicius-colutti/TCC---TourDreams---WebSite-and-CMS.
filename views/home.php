<?php

$modo = 'busca_home';

$id_usuario = '';
$nome_usuario = '';

$id_hotel="";

session_start();
if(isset($_SESSION['id_usuario']))
{
  $id_usuario = $_SESSION['id_usuario'];
  $nome_usuario = $_SESSION['nome_usuario'];
  $foto_usuario = $_SESSION['foto_usuario'];

  if($id_usuario == true){

    $form_login_block = "  <div id='principal_login' style='display:none'>";

    $form_usuario_logado = "<div id='div_usuario_logado' style='display:block'>";

  }else{

    $form_login_block = "  <div id='principal_login' style='display:block'>";

    $form_usuario_logado = "<div id='div_usuario_logado' style='display:none'>";

  }
}else {

  $form_login_block = "  <div id='principal_login' style='display:block'>";

  $form_usuario_logado = "<div id='div_usuario_logado' style='display:none'>";

}

?>


<!DOCTYPE html>
<html>
  <head>


  <script src="jQuery-gRating.js"></script>
  <script>
  	$(".rating").grating();
  </script>
  

    <?php include('head.php'); ?>
    <script>
   $(window).scroll(function() {

    if ($(this).scrollTop()>200)
     {
        $('.produtos_div').fadeIn();
     }
    else
     {
      $('.produtos_div').fadeOut();
     }
 });
</script>



  </head>
  <body>
    <div class="window" id="janela1">
			<hgroup id="hgroup_modal">
			  <h1 class="h1_modal"><p>ÁREA DE AUTENTICAÇÃO</p></h1>
			  <h3 class="h3_modal"><p>Hoteleiros.</p></h3>
			</hgroup>
			<form id="form_modal" method="post" action="views/verificar_login_hoteleiro.php">

			  <div class="group">
				<input type="email" class="input_modal" name="txtEmail_hotel"><span class="highlight"></span><span class="bar"></span>
				<label class="label_modal">E-mail</label>
			  </div>
			  <div class="group">
				<input type="password"  class="input_modal" name="txtSenha_hotel"><span class="highlight"></span><span class="bar"></span>
				<label class="label_modal">Senha</label>
			  </div>
			  <!--<button type="button" class="button buttonBlue" name="btn_conectarse">Conectar-se
				<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
      </button>-->

        <input id="btn_logar_parceiro" type="submit" name="btn_conectarse" value="Conectar-se" style="font-family: Tahoma; font-size: 20px">

			</form>

		</div>

<!-- mascara para cobrir o site -->
<div id="mascara"></div>
    <header>
        <?php include('menu.php'); ?>
      <script type="text/javascript" src="js/scrollReveal.js"></script>
      <script type="text/javascript">
      window.scrollReveal = new scrollReveal();
      </script>
    </header>

      <section>
          <div id="template">
            <div id="caixa_template">
              <?php
                    //Incluindo o arquivo da controller para fazer o select
                    require_once('controllers/aspectos_controller.php');
                    //Instancia do objeto de controller, e chamada dos metodos para listar os registros
                    $controller_img_aspecto = new controllerAspectos();
                    $rsImgTemplate = $controller_img_aspecto->listar_img_template();
                    $cont=0;
                    while ($cont<count($rsImgTemplate)) {



                   ?>

              <img src="admin/cms/<?php echo($rsImgTemplate[$cont]->img_template);?>" alt="template">
              <?php
                $cont+=1;

                }


              ?>
            <div id="busca_index">
              <form class="" action="router.php?controller=home&modo=<?php echo($modo); ?>" method="post">


              <input type="text" id="input_busca" name="busca" value="" placeholder="Locais, Cidades" >
              <button id="btn_buscar" type="submit">
                <img src="imagens/img_btn2.png" alt="dasd">
              </button>
            </form>

            </div>

            <?php echo($form_usuario_logado) ?>
            <a href="perfilUsuario.php?id_usuario=<?php echo($id_usuario); ?>">
              <div id="img_usuario_logado">
                  <img src="<?php echo($foto_usuario); ?>" alt="">
              </div>
              </a>
              <div id="txt_bem_vindo">
                <p>Bem vindo, <?php echo($nome_usuario); ?>!</p>
                <a href="views/logout.php"><img id="img_logout" src="imagens/img_logout.png" alt=""></a>
              </div>

            </div>

              <?php echo($form_login_block) ?>
                  <div id="foto_user">
                    <img src="imagens/user.png" alt="">

                  </div>
                  	<form  method="post" action="views/verificar_login.php">
                    <div id="inputs_login">
                      <input class="inputs_login" type="email" name="txt_login" style="font-family: Tahoma; font-size: 16px" placeholder=" E-mail">
                      <br>
                      <input class="inputs_login" type="password" name="txt_senha" style="font-family: Tahoma; font-size: 16px" placeholder=" Senha">

                    </div>
                      <div id="btn_login">
                        <input id="btn_logar" type="submit" name="btn_logar" value="Conectar-se" style="font-family: Tahoma; font-size: 20px">

                      </div>
                      </form>
                        <div id="cadastra_se">
                          <a href="optCadastro.php" id="a_index_cadastrar">Cadastre-se</a>

                        </div>
            						<div id="log_hoteleiro">
                          <a href="#janela1" id="a_index_cadastrar" rel="modal">Entrar como hoteleiro</a>

                        </div>

              </div>
              </div>
          </div>
          <div class="data_entrada_home">
           <input class="insert_data_home" type="text" placeholder="Check-in" name="txt_entrada" id="calendario"/>
           <div class="img_seta">
              <img src="imagens/seta_icon.png" alt="">
           </div>

          </div>
          <div class="data_saida_home">
               <input class="insert_data_home" type="text" placeholder="Check-out" name="txt_saida" id="calendario2" />
               <div class="img_seta">
                  <img src="imagens/seta_icon.png" alt="">
               </div>
          </div>

          <div id="principal_produtos" >

            <?php include_once('crud_home/home_view.php') ?>

          </div>
      </section>

          <footer>
            <?php include('rodape.php'); ?>
          </footer>
  </body>
</html>
