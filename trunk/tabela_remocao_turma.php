<?
	$tipo = $_GET['tipo'];

	$host  = "localhost"; 
	$database = "sigahack";

	$sql = "select * from turma";

	$login_db = "root"; 
	$senha_db = "root"; 

	$db = mysql_connect ($host, $login_db, $senha_db) 
		or die("Erro ao conectar no banco de dados.<br/>
			   <a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto");
	$basedados = mysql_select_db($database) 
			or die("Erro ao selecionar base de dados.<br/>
				<a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto");

	$confirmacao = mysql_query( $sql, $db )
			or die("Erro ao realizar consulta na base de dados.<br/>
				<a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto");

	$contagem = mysql_num_rows($confirmacao);

	if( $contagem > 0 ){
		
		echo("<table width=\"100%\" border=\"1px\" >");
		echo("<tr>" );
		echo("<td align=\"center\" width=\"10%\"> <b>Codigo </b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Num </b></td>" );
		echo("<td align=\"center\" width=\"10%\"> <b>Sala</b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Horario </b></td>" );
		echo("<td align=\"center\" width=\"60%\"> <b>Professor </b></td>" );
		echo("<td align=\"center\" width=\"10%\"> <b>Acao </b></td>" );
		echo("</tr>" );
		while ( $linha = mysql_fetch_array( $confirmacao ) ) {
			$sql = "select * from aluno_turma where codigo_turma='".$linha[0]."'";
			$resultado = mysql_query( $sql, $db )
			or die("Erro ao realizar consulta na base de dados.<br/>
				<a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto</table>");
			echo("<tr>");
			echo("<td align=\"center\" >" . $linha[0] . "</td>" );
			echo("<td align=\"center\" >"  . $linha[1] . "</td>" );
			echo("<td align=\"center\" >"  . $linha[2] . "</td>" );
			echo("<td align=\"center\" >"  . $linha[3] . "</td>" );
			echo("<td align=\"center\" >"  . $linha[4] . "</td>" );
			if( mysql_num_rows($resultado) == 0 ){
				echo("<td align=\"center\" > <a href=\"remocao.php?tipo_remocao=4&cod_disc=" . $linha[0] . "\"> remover </a></td>" );
			}
			else{
				echo("<td align=\"center\" >remover </td>" );
			}
			echo("</tr>");
		}
		echo("</table>");
	}
	else{
		echo("Nao ha turmas cadastradas");
	}
?>
