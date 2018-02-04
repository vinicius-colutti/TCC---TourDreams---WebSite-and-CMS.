<?php
include_once 'conexao_ok.php';

$nome_sessao = $_SESSION['nome_funcionario'];
$id_funcionario = $_SESSION['id_funcionario'];
$id_setor_sessao = $_SESSION['id_setor'];


 ?>


<!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <!-- jQuery Modal -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <title>Sistema de Gerenciamento | TourDreams</title>
        <link rel="stylesheet" href="css/style_cms.css">
        <link rel="stylesheet" href="http://www.amaranjs.com/AmaranJS/dist/css/amaran.min.css">
    <link rel="stylesheet" href="http://www.amaranjs.com/AmaranJS/dist/css/animate.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Ignore styles below you dont need for basic setup -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="js/jquery.amaran.js"></script>

        <meta charset="utf-8" />
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        <script>
        $(function(){
            $.amaran({
                'message'       :'Bem vindo, <?php echo($nome_sessao); ?>',
                'sticky'        :true,
                'closeOnClick'  :false,
                'cssanimationIn'    :'shake',
                'position'      :'top right',
                'inEffect'      :'slideRight'
            });

        });
    </script>


    <script src="js/classie.js"></script>
		<script src="js/notificationFx.js"></script>
		<script>
			(function() {
				var bttn = document.getElementById( 'notification-trigger' );

				// make sure..
				bttn.disabled = false;

				bttn.addEventListener( 'click', function() {
					// simulate loading (for demo purposes only)
					classie.add( bttn, 'active' );
					setTimeout( function() {

						classie.remove( bttn, 'active' );

						// create the notification
						var notification = new NotificationFx({
							message : '<p>Your preferences have been saved successfully. See all your settings in your <a href="#">profile overview</a>.</p>',
							layout : 'growl',
							effect : 'genie',
							type : 'notice', // notice, warning or error
							onClose : function() {
								bttn.disabled = false;
							}
						});

						// show the notification
						notification.show();

					}, 1200 );

					// disable the button (for demo purposes only)
					this.disabled = true;
				} );
			})();
		</script>

      </head>
      <body>
        <div id="ex1" class="modal">
          <p>Reserva aprovada!! Por favor, acesse o Sistema Desktop para solicitar pagamento ao hotelerio.</p>

        </div>

        <!-- Link to open the modal -->
        <p><a href="#ex1" rel="modal:open" id="open_modal">Open Modal</a></p>
        <header>
          <?php include_once('header.php') ?>

        </header>

          <section id="section_home">

            <?php include_once('section_home.php') ?>
            <?php include_once('crud_reservas/reservas_view.php'); ?>

          </section>

          <footer>
            <?php include('footer.php') ?>

          </footer>


      </body>
      <?php
      if(isset($_GET['reserva_aceita'])){




      ?>
      <script type="text/javascript">




      $('#open_modal').click();





      </script>

      <?php
      }
      ?>


    </html>
