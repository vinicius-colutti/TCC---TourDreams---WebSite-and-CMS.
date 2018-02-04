<div id="principal_menu">
  <?php $paginaCorrente = basename($_SERVER['SCRIPT_NAME']);?>
          <ul class="menu_busca">
            <li>
              <a href="avancada.php"
              <?php if($paginaCorrente == 'avancada.php') {echo'class="menu_busca"';}?>>
              <h1>Busca avançada</h1></a>
          </li>
          <li>
            <a href="parceiros.php"
            <?php if($paginaCorrente == 'parceiros.php') {echo'class="menu_busca"';} ?>>
            <h1>Parceiros</h1></a>
        </li>
        <li>
          <a href="conhecaDestino.php"
          <?php if($paginaCorrente == 'conhecaDestino.php') {echo'class="menu_busca"';}?>>
          <h1>Conheça seu destino</h1></a>

        </li>
        <li>
          <a href="melhoresDestinos.php"
          <?php if($paginaCorrente == 'melhoresDestinos.php') {echo'class="menu_busca"';}?>>
          <h1>Melhores destinos</h1></a>

        </li>
        <li>
          <a href="promocao.php"
          <?php if($paginaCorrente == 'promocao.php') {echo'class="menu_busca"';}?>>
          <h1>Promoções</h1></a>
        </li>
        <li>
          <a href="sobre.php"
          <?php if($paginaCorrente == 'sobre.php') {echo'class="menu_busca"';}?>>
          <h1>Sobre</h1></a>
        </li>
      </ul>
</div>
