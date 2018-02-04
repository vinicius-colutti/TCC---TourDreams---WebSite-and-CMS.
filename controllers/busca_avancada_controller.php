<?php
/*


Objetivo: Selecionar todos os htoéis automáticos e por pesquisa na página home.
data: 09/10/2017.
desenvolvedor: Vinicius Ivan Colutti.
última modificação:09/10/2017
observações: nd.
Arquivos relacionados: router.php, home_view.php, home_class.php.



*/

    class controllerBuscaAvancada{

        public function listar(){

            require_once('models/busca_avancada_class.php');


            $listBusca_controller = new busca();

            return $listBusca_controller->SelectALL();

        }

        public function pesquisa(){

            require_once('models/busca_avancada_class.php');


            if($_SERVER['REQUEST_METHOD'] == 'POST'){


                //Resgatando os valores do form
                $categoria=$_POST['categoria'];

                $where2 = "or id_categoria in ( ";

                $i2 = 0;

                foreach ($categoria as $value) {

                  if($i2==0){
                    $where2 = $where2.$value;



                  }else{

                    $where2 = $where2.",".$value;

                  }

                    $i2++;


                }

                $where2 = $where2.")";
                $caracteristica=$_POST['caracteristicas'];

                $where = "where cqh.id_carac_quarto in ( ";

                $i =0;
                foreach ($caracteristica as $value2) {


                    if($i==0){
                        $where = $where.$value2;

                    }else{
                          $where = $where .",".$value2;
                    }

                  //var_dump($value2);
                  $i++;
                }
                $where = $where.") ";

                $result = $where.$where2;
                //echo  $result;

                $busca=$_POST['busca'];




                $pesquisa_controller = new busca();

                $pesquisa_controller->carac_categoria = $result;
                $pesquisa_controller->busca = $busca;



                $lstPesquisada =  $pesquisa_controller->Pesquisa($pesquisa_controller);



                require_once('avancada.php');



            }

        }


        public function listar_categorias(){

            require_once('models/busca_avancada_class.php');


            $listBusca_controller = new busca();

            return $listBusca_controller->SelectCategorias();

        }
        public function listar_categorias_2(){

            require_once('models/busca_avancada_class.php');


            $listBusca_controller = new busca();

            return $listBusca_controller->SelectCategorias2();

        }

        public function listar_caracteristicas(){

            require_once('models/busca_avancada_class.php');


            $listBusca_controller = new busca();

            return $listBusca_controller->SelectCarac();

        }
        public function listar_caracteristicas_2(){

            require_once('models/busca_avancada_class.php');


            $listBusca_controller = new busca();

            return $listBusca_controller->SelectCarac2();

        }




    }

?>
