<?php
$modo = "inserir_fale_conosco"



 ?>


<form class="" action="router.php?controller=fale_conosco&modo=<?php echo($modo)?>" method="post">


  <div id="campos_fc">
    <input type="text" name="txt_nome_fc" placeholder=" Nome" class="inputs_fc">
    <br>
    <input type="text" name="txt_email_fc" placeholder=" Email" class="inputs_fc_mail">
    <br>
    <input type="text" name="txt_telefone_fc" placeholder=" Telefone" class="inputs_fc_tel">


  </div>
  <div id="sugestao">
    <textarea name="obs" rows="7" cols="80" placeholder=" Sugestões e Críticas" id="input_obs"></textarea>

  </div>
  <div id="div_btn_enviar">
    <input type="submit" name="btn_enviar" value="Enviar" id="btn_enviar">

  </div>
  </form>
