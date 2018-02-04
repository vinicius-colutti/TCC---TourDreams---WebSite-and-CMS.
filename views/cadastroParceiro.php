<!DOCTYPE html>

<html>
  <head>
    <?php

		include('head.php');


		if(isset($_POST['arquivos[]'])){
			$i = 0;

			foreach ($_FILES["arquivos"]["error"] as $key => $error) {

					# Definir o diretório onde salvar os arquivos.
					$destino = "imagens/" . $_FILES["arquivos"]["name"][$i];

					#Move o arquivo para o diretório de destino
					move_uploaded_file( $_FILES["arquivos"]["tmp_name"][$i], $destino );

					#Próximo arquivo a ser analisado
					$i++;
			}
		}


	?>

	<script type="text/javascript">
                $(function(){
                      $('#uploadChange').on('change',function() {
						    var id = $(this).attr('id');
							var totalFiles = $(this).get(0).files.length;



							var htm='<ol>';
							for (var i=0; i < totalFiles; i++) {
                               var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                               var arquivo = $(this).get(0).files[i];
                               var fileV = new readFileView(arquivo, i);
                               htm +='<li class="+c+"><img class="img_parceiro_cadastro2" data-img="'+i+'" data-id="'+id+'" border="1"><span>'+"</li>";
							}
                          htm += '</ol>';


                             $('.img_parceiro_cadastro2').html(htm);

                      });

                    });


                    function readFileView(file, i) {

                      var reader = new FileReader();
                       reader.onload = function (e) {
                         $('[data-img="'+i+'"]').attr('src', e.target.result);
                    }

                      reader.readAsDataURL(file);
                    }





	</script>

  </head>
  <body>
	  <header>
		  <?php include('menu.php'); ?>
	  </header>
   </body>
    <section>
  <div id="principal">

		 <?php

            require_once('crud_cadastroParceiro/parceiro_view.php');

		?>
	  </div>
	</section>
	<footer>
		<?php include('rodape.php'); ?>
	</footer>
</html>
