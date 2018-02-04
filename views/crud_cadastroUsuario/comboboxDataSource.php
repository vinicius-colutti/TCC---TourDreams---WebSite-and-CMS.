
<?php
ini_set('default_charset','utf8');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
	ini_set('default_charset','UTF-8');
	header("Content-Type: text/html; charset=ISO-8859-1", true);
	header("Content-Type: text/html; charset=UTF-8", true);


//bonus630
	function con()
	{
		try
		{
			return new PDO("mysql:dbname=dbtourdreams;host=localhost","root","bcd127");
			mysql_query('SET character_set_connection=utf8');
			mysql_query('SET character_set_client=utf8');
			mysql_query('SET character_set_results=utf8');
		}
		catch(PDOException $erro)
		{
			return $erro;
		}
	}

	function geraJsonEstados()
	{
		$query = con()->query(" select * from uf order by uf_descricao;",PDO::FETCH_ASSOC);
		$estados = $query->fetchAll();
		$stringJson = "{\"Estados\":[";
		for($i=0;$i<count($estados);$i++)
		{
			$stringJson .= "{\"id\":\"".$estados[$i]["uf_codigo"]."\",\"nome\":\"".utf8_encode($estados[$i]["uf_descricao"])."\"}";
			if($i<count($estados)-1)
				$stringJson .= ",";
		}
		$stringJson .= "]}";
		return $stringJson;
	}
	function geraJsonCidades($estadosId)
	{
		$query = con()->query("Select * from cidade where uf_codigo = $estadosId order by cidade_descricao");
		$cidades = $query->fetchAll();
		$stringJson = "{\"Cidades\":[";
		for($i=0;$i<count($cidades);$i++)
		{
			$stringJson .= "{\"id\":\"".$cidades[$i]["cidade_codigo"]."\",\"nome\":\"".utf8_encode($cidades[$i]["cidade_descricao"])."\"}";
			if($i<count($cidades)-1)
				$stringJson .= ",";
		}
		$stringJson .= "]}";
		return $stringJson;
	}

	header('Content-Type: application/json');

	if(isset($_GET["id"]))
		echo geraJsonCidades($_GET["id"]);
	else
		echo geraJsonEstados();
?>
