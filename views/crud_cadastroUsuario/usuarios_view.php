<?php

$id_usuario = "";
$nome_usuario = "";
$cpf_usuario = "";
$rg_usuario = "";
$email_usuario = "";
$senha_usuario = "";
$telefone_usuario = "";
$celular_usuario = "";
$foto_usuario = "";
$qtds_reserva_usuario = "";
$senha_usuario = "";
$btn_usuario = "ENVIAR";

$rua_usuario = "";
$bairro_usuario = "";
$numero_usuario = "";


$action = "novo";


 ?>



<form name="Cadastro_usu" method="post" enctype="multipart/form-data" action="router.php?controller=usuarios&modo=<?php echo($action) ?>">
   <div id="espaco_cadastro_usuario">
     <input placeholder=" Nome" type="text" name="nome_usuario" value="<?php echo($nome_usuario) ?>" class="input_cadastro_usu" required>
     <input placeholder=" E-mail" type="text" name="email_usuario" value="<?php echo($email_usuario) ?>" class="input_cadastro_usu" required>

     <div id="corpo">

       <select name="cb_estado" id="cb_estado" class="option_cadastro">
         	<option selected id="cb_estado_selecione">Estado</option>
       </select>
           <select name="cb_cidade" id="cb_cidade" style="display:none;" class="option_cadastro">
       </select>
     </div>

    <script src="jquery-2.1.1.min.js"></script>

    <script>
      $(document).ready(function(e) {
        $.ajax({"url":"views/crud_cadastroUsuario/comboboxDataSource.php"}).done(
        function(data){
          for(var i =0;i<data.Estados.length;i++)
          {
            var idEstado = data.Estados[i].nome;
              $('select[name="cb_estado"]').append("<option value=\""+data.Estados[i].id+"\">"+idEstado+"</option>");


          }
        });
         });
      $('select[name="cb_estado"]').change(
        function(){
          var estadoValor = $("select option:selected").val();
          var cb_cidade = $('select[name="cb_cidade"]');
          var cb_estado = $(this);
          $.ajax({"url":"views/crud_cadastroUsuario/comboboxDataSource.php?id="+estadoValor}).done(
            function(data){
              var nCidade = data.Cidades.length;
              cb_cidade.show(200);
              cb_cidade.empty();
              cb_estado.find("option:contains('Selecione')").remove();
              $("#corpo").width(250);
              for(var i =0;i<nCidade;i++)
              {
                var idCidade = data.Cidades[i].nome;
                cb_cidade.append("<option value=\""+data.Cidades[i].id+"\">"+data.Cidades[i].nome+"</option>");
              }
            }
          );
        });
    </script>

     <input placeholder=" Rua" type="text" name="rua_usuario" value="<?php echo($rua_usuario) ?>" class="input_cadastro_usu" required>
     <input placeholder=" Bairro" type="text" name="bairro_usuario" value="<?php echo($bairro_usuario) ?>" id="input_cadastro_usu_bairro" required>
     <input placeholder=" N°" type="text" name="numero_usuario" value="<?php echo($numero_usuario) ?>" id="input_cadastro_usu_numero" required>
     <input placeholder=" Telefone" type="text" name="telefone_usuario" value="<?php echo($telefone_usuario) ?>" id="telefone_usuario" class="input_cadastro_usu"
     onkeypress="this.value = FormataTel(event)" maxlength="13" required>
     <input placeholder=" Celular" type="text" name="celular_usuario" value="<?php echo($celular_usuario) ?>" id="celular_usuario" class="input_cadastro_usu"
     onkeypress="this.value = FormataCel(event)" maxlength="13" required>
     <input placeholder=" CPF" type="text" name="cpf_usuario" value="<?php echo($cpf_usuario) ?>" id="cpf_usuario" class="input_cadastro_usu"
     onkeypress="this.value = FormataCpf(event)" onpaste="return false;" maxlength="14" required>
     <input placeholder=" RG" type="text" name="rg_usuario" value="<?php echo($rg_usuario) ?>" id="rg_usuario" class="input_cadastro_usu"
     onkeypress="this.value = FormataRg(event)" onpaste="return false;" maxlength="12" required>
     <input placeholder=" Senha" type="password" name="senha_usuario" value="<?php echo($senha_usuario) ?>" class="input_cadastro_usu"
     maxlength="15" required>
   </div>
   <div id="espaco_cadastro_usuario">

     <div id="foto_cadastro_usuario">
       <img src="imagens/usuario.png" width="100%" height="98%"/>
     </div>
     <div id="espacoBotao_enviarfile">
       <label id="escolha_foto_usu_label"for='filefotousuario'>Escolha uma foto</label>
       <input type="file" name="arquivos[]" id="filefotousuario"/>
     </div>
     <div id="txt_info_cadastroUsuario">
       <p>Preencha este rápido formulário por completo para que possamos guardar suas informações
          de uma forma segura, e termos um conhecimento mais amplo sobre você!
       </p>
     </div>
     <input type="submit" name="btnCadastrar" value="<?php echo($btn_usuario) ?>" id="botao" style="<?php echo($style_btn) ?>" class="btn_enviar_cadastrousu">

   </div>
</form>
