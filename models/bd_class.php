<?php

class mysql_db{
  //atributos para conexão com BD;
  public $server;
  public $user;
  public $password;

  //metodo construtor: serve para no momento da instancia da classe será acioando automaticamente, no php o metodo construtor tambem é conhecido por metodo mágico
  public function __construct(){
      //guardando os valores referente a conexão do banco de dados, nos atributos da classe
      $this->server="localhost";
      $this->user="root";
      $this->password="bcd127";
  }

  //metodo para conectar no banco de dados
  public function conectar(){

      //estabelece a conexão com o banco de dados, se a conexão estiver correta, seleciona o database, caso contrário, informa uma mensagem e finaliza a conexão
      if (@$conexao=mysql_connect( $this->server,  $this->user,  $this->password)){

          mysql_select_db('dbtourdreams');

      }else{

          echo('Não foi possível conectar-se com o banco de dados, favor informar o Administrador do Banco.');
          die();

      }

  }

  //metodo para fechar a conexão
  public function desconectar(){

      //fecha a conexão com o banco
      mysql_close();

  }

}




?>
