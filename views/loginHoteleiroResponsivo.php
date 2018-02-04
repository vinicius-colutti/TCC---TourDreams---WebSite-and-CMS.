


<html lang="en" class="no-js">
  <head>
    <?php include('head.php'); ?>
   </head>
   <header>
        <?php include('menu.php'); ?>
   </header>
   <section>
     <div id="principal">
       <form method="post" action="views/verificar_login_hoteleiro.php">
         <div id="espaco_login_responsivo">

            <input name="txtEmail_hotel"  type="text" placeholder=" E-mail" class="input_login_usu"/>

            <input name="txtSenha_hotel"  type="password" placeholder=" Senha" class="input_login_usu"/>


            <input id="botao_conectar_login" type="submit" name="btn_logar" value="Conectar-se" style="font-family: Tahoma; font-size: 55px">
            <div id="cadastrarespaco">
              <a href="cadastroParceiro.php"><p>Cadastre-se</p></a>
            </div>
         </div>
      </form>
     </div>

   </section>


</html>
