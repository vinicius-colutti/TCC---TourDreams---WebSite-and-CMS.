
<!DOCTYPE html>

<html lang="en" class="no-js">
  <head>
    <?php include('head.php'); ?>
   </head>
   <header>
        <?php include('menu.php'); ?>
   </header>
   <section>
     <div id="principal">
       <form method="post" action="views/verificar_login_responsivo.php">
         <div id="espaco_login_responsivo">
            <input name="txt_login"  type="text" placeholder=" E-mail" class="input_login_usu"/>

            <input name="txt_senha"  type="password" placeholder=" Senha" class="input_login_usu"/>


            <input id="botao_conectar_login" type="submit" name="btn_logar" value="Conectar-se" style="font-family: Tahoma; font-size: 55px">
            <div id="cadastrarespaco">
              <a href="cadastroUsuario.php"><p>Cadastre-se</p></a>
            </div>
         </div>
     </form>
     </div>

   </section>


</html>
