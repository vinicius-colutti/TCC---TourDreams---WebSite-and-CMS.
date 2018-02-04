<?php
/*


Objetivo: CRUD do fale conosco.
data: 01/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:01/10/2017
observações: nd.
Arquivos relacionados: router.php, fale_conosco_view.php, fale_class.php.



*/

    class controllerFale{

        public function listar(){

            require_once('models/fale_class.php');


            $listPromocoes_controller = new faleconosco();

            return $listPromocoes_controller->SelectALL();

        }
        public function buscar_fale(){
          //Coleta do parâmetro GET id_cadastro
            $id_fale_conosco = $_GET['id_fale_conosco'];


            //Instância da classe Contato e com o atributo de id_cadastro
            $fale_class = new faleconosco();
            $fale_class->id_fale_conosco = $id_fale_conosco;
            $result = $fale_class->SelectById($fale_class);

            require_once("fale_conosco.php");



        }

        public function deletar_fale(){
          if($_SERVER['REQUEST_METHOD'] == 'GET'){


              //Resgatando os valores do form
              $id_fale_conosco=$_GET['id_fale_conosco'];


              $fale_controller = new faleconosco();
              $fale_controller->id_fale_conosco = $id_fale_conosco;


              $fale_controller->Delete($fale_controller);


          }

        }



    }

?>
