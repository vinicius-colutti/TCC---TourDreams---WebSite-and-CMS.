
<?php

	class quarto {
			public $nome_quarto;
			public $numero_quarto;
			public $camas_solteiro;
			public $camas_casal;
			public $id_carac_quarto;
			public $id_carac_quarto_hotel;
			public $id_imagem;
			public $descricao_carac_quarto;
			public $senha_hotel;
			public $id_quarto;
			public $id_hotel;

      public function __construct(){

        //incluir o arquivo de conexao
        require_once('models/bd_class.php');
        //cria uma instancia da classe mysql_db
        $conexao_bd = new mysql_db();
        //estabelece a conexao com BD
        $conexao_bd->conectar();



      }

		public function BuscarInfoQuarto($quarto,$id_quarto){
     $id_quarto = $_GET['id_quarto'];
		 $sqlq0 = "select q.id_quarto,q.id_hotel,q.nome_quarto, q.numero_quarto,
			q.camas_solteiro, q.camas_casal, q.preco_quarto,i.id_quarto,i.nome_imagem
			from tbl_quarto  as q
			JOIN tbl_imagens_quarto as i
			ON i.id_quarto = q.id_quarto
			where q.id_quarto=$quarto->id_quarto";
		//echo($sqlq0);
		 $select = mysql_query($sqlq0);
		 $listEditar="";
			while($rsconsulta0=mysql_fetch_array($select)){

				$listEditar = new quarto;

				$listEditar->id_quarto=$rsconsulta0['id_quarto'];
				$listEditar->id_hotel=$rsconsulta0['id_hotel'];
				$listEditar->nome_quarto=$rsconsulta0['nome_quarto'];
				$listEditar->numero_quarto=$rsconsulta0['numero_quarto'];
				$listEditar->camas_solteiro=$rsconsulta0['camas_solteiro'];
				$listEditar->camas_casal=$rsconsulta0['camas_casal'];
				//$listEditar->id_carac_quarto=$rsconsulta0['id_carac_quarto'];
				//$listEditar->descricao_carac_quarto=$rsconsulta0['descricao_carac_quarto'];
				$listEditar->preco_quarto=$rsconsulta0['preco_quarto'];


			}
			return $listEditar;
			//header('location:editarQuarto.php?id_quarto='.$id_quarto.'');*/

	  }
		public function BuscarInfoQuartoImagens($quarto,$id_quarto){
			$sql_imagens_quarto ="select * from tbl_imagens_quarto where id_quarto=".$id_quarto;
			//echo($sql_imagens_quarto);
		$select_imagem = mysql_query($sql_imagens_quarto);
		$cont_imagem = 0;
		$listEditar_imagem="";
			while($rsconsultaimagens=mysql_fetch_array($select_imagem)){
					$listEditar_imagem [] = new quarto;

					$listEditar_imagem[$cont_imagem]->id_quarto=$rsconsultaimagens['id_quarto'];
					$listEditar_imagem[$cont_imagem]->id_imagem_quarto=$rsconsultaimagens['id_imagem_quarto'];
					$listEditar_imagem[$cont_imagem]->nome_imagem=$rsconsultaimagens['nome_imagem'];

					$cont_imagem +=1;
			}
				return $listEditar_imagem;
		}



//Inner JOIN tbl_imagens_quarto as i
	  public function SelectQuartos($quarto,$id_hotel){
		  $sqlq = "select * from tbl_quarto
			where id_hotel=".$id_hotel;

		//echo($sqlq);
		 $select3 = mysql_query($sqlq);
		  $cont3 = 0;
			$listQuartos="";
			while($rsconsulta1=mysql_fetch_array($select3)){

				$listQuartos[] = new quarto;

				$listQuartos[$cont3]->id_quarto=$rsconsulta1['id_quarto'];
				$listQuartos[$cont3]->id_hotel=$rsconsulta1['id_hotel'];
				$listQuartos[$cont3]->nome_quarto=$rsconsulta1['nome_quarto'];
				$listQuartos[$cont3]->numero_quarto=$rsconsulta1['numero_quarto'];
				$listQuartos[$cont3]->camas_solteiro=$rsconsulta1['camas_solteiro'];
				$listQuartos[$cont3]->camas_casal=$rsconsulta1['camas_casal'];
				$listQuartos[$cont3]->preco_quarto=$rsconsulta1['preco_quarto'];
				//$listQuartos[$cont3]->nome_imagem=$rsconsulta1['nome_imagem'];


				$cont3 +=1;
			}
			return $listQuartos;

	  }
	  public function  EditarQuarto($quarto,$id_quarto){
		$sql_update_editar="update tbl_quarto set nome_quarto='".$quarto->nome_quarto."',numero_quarto='".$quarto->numero_quarto."',camas_solteiro='".$quarto->camas_solteiro."',camas_casal='".$quarto->camas_casal."',preco_quarto='".$quarto->preco_quarto."' where id_quarto=".$id_quarto;
		//echo($sql_update_editar);

		mysql_query($sql_update_editar);




	  }
	  public function DelImgQuarto($quarto,$id_imagem,$id_quarto){
		  //echo($id_quarto);
		  $id_quarto = $_GET['id_quarto'];
		  $id_imagem = $_GET['id_imagem'];

		  $sql_delimg="delete from tbl_imagens_quarto where id_imagem_quarto=".$id_imagem;
		 // echo($sql_delimg);
		 mysql_query($sql_delimg);


		  header('location:EditarQuarto.php?modo=BuscarInfoQuarto&id_quarto='.$id_quarto.'');


	  }
	  public function UpdateCaracQuarto( $id_quarto){
			//$sql="select id_carac_quarto from caracteristicas_quarto_hotel where id_quarto=".$id_quarto;
		//	mysql_query($sql);


			//	if($sql != $this->id_carac_quarto or $sql == $this->id_carac_quarto){

					$sql_carac_quarto_editar="update caracteristicas_quarto_hotel set id_carac_quarto='".$this->id_carac_quarto."' where id_quarto=	'".$id_quarto;

					//echo($sql_carac_quarto_editar);
					mysql_query($sql_carac_quarto_editar);
				//}

	  }
	  public function InsertCaracQuartoEditar( $id_quarto,$id_carac_quarto_hotel){


					$sql4="insert into caracteristicas_quarto_hotel(id_carac_quarto, id_quarto)values('".$this->id_carac_quarto."','".$id_quarto."')";

					  // echo($sql4);
					mysql_query($sql4);
					  header('location:EditarQuarto.php?id_quarto='.$id_quarto.'');




	  }

	  public function  InsertQuarto($quarto){


		$sql3="insert into tbl_quarto(id_hotel,nome_quarto,numero_quarto,camas_solteiro,camas_casal,preco_quarto)values('".$quarto->id_hotel."','".$quarto->nome_quarto."','".$quarto->numero_quarto."','".$quarto->camas_solteiro."','".$quarto->camas_casal."','".$quarto->preco_quarto."')";

		//echo($sql3);
		mysql_query($sql3);

		$id_quarto = mysql_insert_id();
    $id_quarto_insert = '';
    return $id_quarto;


  }
  public function InsertImagemQuarto($id_quarto, $destino){
		$sql5="insert into tbl_imagens_quarto(id_quarto,nome_imagem)values('".$id_quarto."','".$destino."')";
	   mysql_query($sql5);
  }
  public function AddImgQuarto($id_quarto, $destino){
		$sql5="insert into tbl_imagens_quarto(id_quarto,nome_imagem)values('".$id_quarto."','".$destino."')";
	   mysql_query($sql5);
	   header('location:EditarQuarto.php?modo=BuscarInfoQuarto&id_quarto='.$id_quarto.'');

  }
	  public function InsertCaracQuarto( $id_quarto, $id_hotel){


		$sql4="insert into caracteristicas_quarto_hotel(id_carac_quarto, id_quarto)values('".$this->id_carac_quarto."','".$id_quarto."')";

      // echo($sql4);
    mysql_query($sql4);
	  //header('location:cadastroParceiro3.php?id_hotel='.$id_hotel.'');





	  }
	  public function SelectCategoriaQuarto($quarto){
		  	/*$sql2="select c.id_carac_quarto, from caracteristicas_quarto as c JOIN caracteristicas_quarto_hotel as cq ON c.id_carac_quarto = cq.id_carac_quarto where cq.id_quarto=".$id_quarto;*/
			$sql2="select * from caracteristicas_quarto ";
			//echo($sql2);

			$select2 = mysql_query($sql2) or die(mysql_error());;
			$cont2 = 0;
			while($rsconsulta=mysql_fetch_array($select2)){
				$listCategoriaQuarto[] = new quarto;
				$listCategoriaQuarto[$cont2]->id_carac_quarto=$rsconsulta['id_carac_quarto'];
				$listCategoriaQuarto[$cont2]->descricao_carac_quarto=$rsconsulta['descricao_carac_quarto'];
				/*$listCategoriaQuarto[$cont2]->id_quarto=$rsconsulta['id_quarto'];
				$listCategoriaQuarto[$cont2]->id_carac_quarto_hotel=$rsconsulta['id_carac_quarto_hotel'];*/

				$cont2 +=1;
			}
			return $listCategoriaQuarto;



		}

public function DelCarac($id_quarto){
	$sql_del_carac ="delete from caracteristicas_quarto_hotel where id_quarto = ".$id_quarto->id_quarto;
	mysql_query($sql_del_carac);

}
	public function SelectCheckQuarto($quarto,$id_quarto, $id_carac_quarto){
		  /*$sql_check = "select c.id_carac_quarto, cq.id_quarto,c.descricao_carac_quarto,cq.id_carac_quarto_hotel from caracteristicas_quarto as c JOIN caracteristicas_quarto_hotel as cq ON c.id_carac_quarto = cq.id_carac_quarto where cq.id_quarto=".$id_quarto;*/
		  $sql = "SELECT *
					FROM caracteristicas_quarto AS cq
					INNER JOIN caracteristicas_quarto_hotel AS cqh
						ON cq.id_carac_quarto=cqh.id_carac_quarto
					WHERE cqh.id_quarto =".$id_quarto." AND cqh.id_carac_quarto =".$id_carac_quarto;

		 $select = mysql_query($sql);

		  if (mysql_num_rows($select) > 0)
		  {
			  return 'checked';
		  }
		  else
		  {
			  return '';
		  }
		  /*$select_check= mysql_query($sql_check);
		  $cont22 = 0;
		  while($rsconsulta_check=mysql_fetch_array($select_check)){
				$listCheckQuarto[] = new quarto;

				$listCheckQuarto[$cont22]->id_carac_quarto=$rsconsulta_check['id_carac_quarto'];
				$listCheckQuarto[$cont22]->id_quarto=$rsconsulta_check['id_quarto'];
				$listCheckQuarto[$cont22]->descricao_carac_quarto=$rsconsulta_check['descricao_carac_quarto'];
				$listCheckQuarto[$cont22]->id_carac_quarto_hotel=$rsconsulta_check['id_carac_quarto_hotel'];

				$cont22 += 1;

		  }
		   return $listCheckQuarto;*/
	  }
	  public function excluirQuarto($quarto,$id_quarto,$id_hotel){
		 $sql_excluir1 ="delete from tbl_imagens_quarto where id_quarto =".$id_quarto;

		  //echo($sql_excluir1);
		   mysql_query($sql_excluir1);

		   $sql_excluir2 ="delete from caracteristicas_quarto_hotel where id_quarto =".$id_quarto;

		  //echo($sql_excluir2);
		   mysql_query($sql_excluir2);

		 /* $sql_excluir ="delete q.id_quarto,ch.id_quarto,i.id_quarto
		  FROM tbl_quarto  as q
		  JOIN caracteristicas_quarto_hotel as ch
		  ON q.id_quarto = ch.id_quarto
		  JOIN tbl_imagens_quarto as i
		  ON i.id_quarto = q.id_quarto
		  where q.id_quarto = ".$id_quarto;
		 */

		 $sql_excluir = "delete from tbl_quarto where id_quarto =".$id_quarto;
		//echo($sql_excluir);
		mysql_query($sql_excluir);
		header('location:home.php');
			//<script>
			//	alert("quarto excluido com sucesso!");
			//</script>
	  }
	}
?>
