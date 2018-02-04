<?php
$id_aspectos = '';
$modo_cor_preco = 'att_cor_preco';
$modo_cor_rodape = 'att_cor_rodape';
$modo_img_template = 'att_img_template';
$modo_pontos_mtf = "att_pnts_mtf";




 ?>


<div id="pricipal_cores_e_aspectos">
  <div id="txt_cores_aspectos">
    <p>Altere as cores dos preços dos hoteis.</p>

  </div>

  <div id="principal_cores_produtos">
    <form class="" action="router.php?controller=aspectos_site&modo=<?php echo($modo_cor_preco)?>&id_aspectos=<?php echo($id_aspectos)?>" method="post">


    <div id="tab-i18n">
      <h2 id="h2_input_cor">Clique na caixa, e selecione a cor...</h2>

      <input type="text" class="cp-i18n" value="" id="input_cor" name="input_cor_aspecto" placeholder="Exemplo: 000"/>

      <script>
        $(function() {
          $('.cp-i18n').colorpicker({
            regional: 'nl',
            showNoneButton: true,
            alpha: true
          });
        });
      </script>
   </div>

   <div id="div_btn_salvar_cor_preco_produto">
     <button type="submit" name="button">
       <img src="imagens/save_color.png" alt="asdasd" id="img_save_color">
     </button>

   </div>
   </form>
   <div class="cor_principal_cores_hotel">
     <h1>Cor Atual:</h1>
     <?php
           //Incluindo o arquivo da controller para fazer o select
           require_once('controllers/aspectos_controller.php');
           //Instancia do objeto de controller, e chamada dos metodos para listar os registros
           $controller_aspectos = new controllerAspectos();
           $rsCorPreco = $controller_aspectos->listar_cor_preco();
           $cont=0;
           while ($cont<count($rsCorPreco)) {



          ?>
     <div class="cor_principal_cores_hotel_id" style="background-color:#<?php echo($rsCorPreco[$cont]->cor_preco);?>">

     </div>
     <?php
       $cont+=1;

       }


     ?>
   </div>

  </div>
  <div id="txt_cores_aspectos_rodape">
    <p>Altere a cor do rodapé.</p>

  </div>
  <form class="" action="router.php?controller=aspectos_site&modo=<?php echo($modo_cor_rodape)?>&id_aspectos=<?php echo($id_aspectos)?>" method="post">


  <div id="principal_cores_rodape">
    <div id="tab-i18n">
      <h2 id="h2_input_cor">Clique na caixa, e selecione a cor...</h2>
      <input type="text" class="cp-i18n" value="" id="input_cor" placeholder="Exemplo: 000" name="input_rodape_aspecto"/>

      <script>
        $(function() {
          $('.cp-i18n').colorpicker({
            regional: 'nl',
            showNoneButton: true,
            alpha: true
          });
        });
      </script>
   </div>

   <div id="div_btn_salvar_cor_preco_produto">
     <button type="submit" name="button">
       <img src="imagens/save_color.png" alt="asdasd" id="img_save_color">
     </button>

   </div>

  </div>
  </form>
  <div class="cor_principal_cores_rodape">
    <h1>Cor Atual:</h1>
    <?php
          //Incluindo o arquivo da controller para fazer o select
          require_once('controllers/aspectos_controller.php');
          //Instancia do objeto de controller, e chamada dos metodos para listar os registros
          $controller_aspectos = new controllerAspectos();
          $rsCorRodape = $controller_aspectos->listar_cor_rodape();
          $cont=0;
          while ($cont<count($rsCorRodape)) {



         ?>

    <div class="cor_principal_cores_rodape_id" style="background-color:#<?php echo($rsCorRodape[$cont]->cor_rodape);?>">

    </div>
    <?php
      $cont+=1;

      }


    ?>



  </div>
  <div id="txt_image_template">
    <p>Altere a imagem do template</p>
  </div>
  <form class="" action="router.php?controller=aspectos_site&modo=<?php echo($modo_img_template)?>&id_aspectos=<?php echo($id_aspectos)?>" method="post" enctype="multipart/form-data">


  <div id="principal_img_template">
    <div id="multiple_upload">
        <input type="file" name="arquivos[]" multiple="multiple" id="uploadChange" />
        <div id="message">Selecionar fotos</div>
        <input type="button" id="botao" value="Upload" />
       <div id="lista">
       </div>

    </div>

  </div>
  <div id="div_save_imagem_slide_ca">
    <input type="submit" name="btn_salvar_imagens" value="">
  </div>
  </form>

  <div class="img_atual_template">
    <h1>Template atual:</h1>
    <div class="img_atual_template_id">
      <?php
            //Incluindo o arquivo da controller para fazer o select
            require_once('controllers/aspectos_controller.php');
            //Instancia do objeto de controller, e chamada dos metodos para listar os registros
            $controller_aspectos = new controllerAspectos();
            $rsImgTemplate = $controller_aspectos->listar_img_template();
            $cont=0;
            while ($cont<count($rsImgTemplate)) {



           ?>


            <img src="<?php echo($rsImgTemplate[$cont]->img_template);?>" alt="">
      <?php
        $cont+=1;

        }


      ?>
    </div>

  </div>

  <script type="text/javascript">
  $(function(){
        $('#uploadChange').on('change',function() {
             var id = $(this).attr('id');
            var totalFiles = $(this).get(0).files.length;
            if(totalFiles == 0) {
              $('#message').text('Selecionar fotos' );
            }
            if ( totalFiles > 1) {
              $('#message').text( totalFiles+' arquivos selecionados' );
            } else {
              $('#message').text( totalFiles+' arquivo selecionado' );
            }
               var htm='<ol>';
             for (var i=0; i < totalFiles; i++) {
                 var c = (i % 2 == 0) ? 'item_white' : 'item_grey';
                 var arquivo = $(this).get(0).files[i];
                 var fileV = new readFileView(arquivo, i);
                 htm += '<li class="'+c+'"><div class="box-images"><img class="item" data-img="'+i+'" data-id="'+id+'" border="0"></div><span>'+arquivo.name+'</span><a href="javascript:removeFile('+i+',\''+id+'\')" class="remove">x</a></li>'+"\n";
             }
            htm += '</ol>';
               $('#lista').html(htm);

        });

      });

      function readFileView(file, i) {

        var reader = new FileReader();
         reader.onload = function (e) {
           $('[data-img="'+i+'"]').attr('src', e.target.result);
      }
         reader.readAsDataURL(file);
      }

      function removeFile(item, id) {
        var el = $('img[data-img="'+item+'"]');
        var textoQtdArquivosAtuais = $('#message').text();
        var qtdArquivosSelecionados = parseInt(textoQtdArquivosAtuais.substring(0, parseInt(textoQtdArquivosAtuais.indexOf(' arquivo'))));

      if (confirm('Tem certeza que deseja remover este item?')) {
          el.closest("li").remove();
          qtdArquivosSelecionados = qtdArquivosSelecionados -1;
          //Alterando label com quantidade de arquivos selecionados..

            if(qtdArquivosSelecionados == 0) {
              $('#message').text('Selecionar fotos' );
            } else {
            if (qtdArquivosSelecionados > 1) {
              $('#message').text( qtdArquivosSelecionados+' arquivos selecionados' );
            } else {
              $('#message').text( qtdArquivosSelecionados+' arquivo selecionado' );
            }
            }
      }
      }

  </script>


</div>
<div id="pricipal_mtf_pontos">
  <div id="txt_pontos_mtf_cliente">
    <p>Altere os pontos MTF</p>
  </div>
  <form class="" action="router.php?controller=aspectos_site&modo=<?php echo($modo_pontos_mtf)?>&id_aspectos=<?php echo($id_aspectos)?>" method="post">


  <div id="div_pontos_cliente">
    <div class="pontos_cliente">
      <input type="text" name="txt_reserva" value="">
      <h1>Pontos por reserva realizada...</h1>
    </div>
    <div class="pontos_cliente">
      <input type="text" name="txt_comentario" value="">
      <h1>Pontos por comentário realizado...</h1>
      <div id="div_botao_mtf_pontos">
        <input type="submit" name="btn_salvar_pontos_mtf" value="SALVAR">
      </div>
      </form>

    </div>
    <div class="select_pontos_mtf_reservas">
      <?php
            //Incluindo o arquivo da controller para fazer o select
            require_once('controllers/aspectos_controller.php');
            //Instancia do objeto de controller, e chamada dos metodos para listar os registros
            $controller_aspectos = new controllerAspectos();
            $rsPtnsReserva = $controller_aspectos->listar_ptns_reserva();
            $cont=0;
            while ($cont<count($rsPtnsReserva)) {



           ?>

      <p><?php echo($rsPtnsReserva[$cont]->qtd_ponto_reservas);?> pnts</p>
      <?php
        $cont+=1;

        }


      ?>

    </div>
    <div class="select_pontos_mtf_comentarios">
      <?php
            //Incluindo o arquivo da controller para fazer o select
            require_once('controllers/aspectos_controller.php');
            //Instancia do objeto de controller, e chamada dos metodos para listar os registros
            $controller_aspectos = new controllerAspectos();
            $rsPtnsComentario = $controller_aspectos->listar_ptns_comentarios();
            $cont=0;
            while ($cont<count($rsPtnsComentario)) {



           ?>
      <p><?php echo($rsPtnsComentario[$cont]->qtd_ponto_comentario);?> pnts</p>
      <?php
        $cont+=1;

        }


      ?>
    </div>



  </div>

</div>
