<!DOCTYPE html>
<html>
  <head>
    <?php include('head.php'); ?>
  </head>
  <body>
	  <header>
		  <?php include('menu.php'); ?>
	  </header>
   </body>
   <section>
      <div id="principal">
    		<div id="seja_usuario">
    			<p>  SEJA UM USUÁRIO  </p>
    		</div>
        <?php
            require_once('crud_cadastroUsuario/usuarios_view.php');
        ?>
	    </div>
	</section>
	<footer>
		<?php include('rodape.php'); ?>
	</footer>
</html>
