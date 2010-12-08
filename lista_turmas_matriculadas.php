<?
	$host  = "localhost"; 
	$database = "sigahack";

	$sql = "select codigo_turma, num_turma, horario, ch, nome_disc, nota, faltas from (disciplina join aluno_turma) natural join turma where codigo_disc=codigo_turma && matricula_aluno='".$_SESSION['usuario']."'";
	
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
		echo("<td align=\"center\" width=\"5%\"> <b>Horario</b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>CH</b></td>" );
		echo("<td align=\"center\" width=\"40%\"> <b>Nome</b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Nota</b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Faltas</b></td>" );
		echo("</tr>" );
		while ( $linha = mysql_fetch_array( $confirmacao ) ) {
			echo("<tr>");
			echo("<td align=\"center\" >" . $linha[0] . "</td>" );
			echo("<td align=\"center\" >" . $linha[1] . "</td>" );
			echo("<td align=\"center\" >" . $linha[2] . "</td>" );
			echo("<td align=\"center\" >" . $linha[3] . "</td>" );
			echo("<td align=\"center\" >" . $linha[4] . "</td>" );
			echo("<td align=\"center\" >" . $linha[5] . "</td>" );
			echo("<td align=\"center\" >" . $linha[6] . "</td>" );
			echo("</tr>");
		}
		echo("</table>");
	}
	else{
		echo("<br/>Nao ha matricula em turmas");
	}

?>
