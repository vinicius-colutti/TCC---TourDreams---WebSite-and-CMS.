<?php
$modo = "nova_foto_sobre";

$id_sobre_a_empresa = "";




 ?>

<div id="txt_imagens_sobre_empresa">


</div>
<div id="select_imagens_sobre">
  <?php
        //Incluindo o arquivo da controller para fazer o select
        require_once('controllers/sobre_controller.php');
        //Instancia do objeto de controller, e chamada dos metodos para listar os registros
        $controller_sobre = new controllerSobre();
        $rsSobreFoto = $controller_sobre->listar_fotos();
        $cont=0;
        while ($cont<count($rsSobreFoto)) {



       ?>
  <div class="img_sobre_a_empresa">
    <div class="excluir_img_sobre">
      <a href="<?php echo("router.php?controller=sobre_empresa&modo=excluir_img&id_imagem_sobre=".$rsSobreFoto[$cont]->id_imagem_sobre); ?>"><img src="imagens/remover_img.png" alt="asd"></a>

    </div>
      <img src="<?php echo($rsSobreFoto[$cont]->descricao_imagem_sobre);?>" alt="asdasd">

  </div>
  <?php
    $cont+=1;

    }


  ?>

</div>
<div id="sobre_nossa_empresa">
  <div id="txt_sobre_nosssa_empresa_slider">
    <p>Adicione fotos para o slider</p>

  </div>
  <p>Utilize a tecla <b>Ctrl</b> para selecionar mais de um arquivo.</p>
  <form class="" action="router.php?controller=sobre_empresa&modo=<?php echo($modo)?>&id_sobre_a_empresa=<?php echo($id_sobre_a_empresa)?>" method="post" enctype="multipart/form-data">


  <div id="multiple_upload">
      <input type="file" name="arquivos[]" multiple="multiple" id="uploadChange" />
      <div id="message">Selecionar fotos</div>
      <input type="button" id="botao" value="Upload" />
     <div id="lista">
     </div>
  </div>



</div>
<div id="div_save_imagem_slide">
  <input type="submit" name="btn_salvar_imagens" value="">
</div>
</form>



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
