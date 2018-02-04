<!DOCTYPE html>
<html>
  <head>
    <?php include('head.php'); ?>
  </head>
  <body>
  <header>
      <?php
        include('menu.php');
      
      ?>
  </header>

  <section>
      <div id="principal">
        <div id="area_optCadastro">
          <div id="txt_area_optCadastro">
            <p>Cadastre-se para fazer parte da grande comunidade TourDreams!</p>
          </div>
          <div id="btns_area_optCadastro">
            <a href="cadastroUsuario.php">
              <div class="btn_area_optCadastro">
                <p>USUÁRIO</p>
              </div>
            </a>

            <a href="cadastroParceiro.php?id_hotel=0">
              <div class="btn_area_optCadastro">
                <p>HOTELEIRO</p>
              </div>
            </a>

            <div class="txt_btn_optCadastro">
              <p>Reservar hotéis, resorts, pousadas em qualquer
                lugar do mundo.</p>
            </div>

            <div class="txt_btn_optCadastro">
              <p>Divulgue seus estabelecimentos para que
                encontrem com mais praticidade.</p>
            </div>

            <div id="txt_btn_optCadastro">
              <p>Reservar hotéis, resorts, pousadas em qualquer
                lugar do mundo.</p>
            </div>

            <div id="txt_btn2_optCadastro">
              <p>Divulgue seus estabelecimentos para que
                encontrem com mais praticidade.</p>
            </div>

          </div>
        </div>
      </div>

  </section>

  <footer>
    <?php include('rodape.php'); ?>
  </footer>
  </body>
</html>
