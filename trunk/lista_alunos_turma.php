<?
	
	
	$host  = "localhost"; 
	$database = "sigahack";

	$sql = "select matricula_aluno, nome_aluno from aluno natural join aluno_turma where codigo_turma='" . $_GET['cod_turma'] . "' && num_turma='" . $_GET['num_turma']  .  "'";

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
		echo("<td align=\"center\" width=\"20%\"> <b>Matricula </b></td>" );
		echo("<td align=\"center\" width=\"80%\"> <b>Nome </b></td>" );
		echo("</tr>" );
		while ( $linha = mysql_fetch_array( $confirmacao ) ) {
			echo("<tr>");
			echo("<td align=\"center\" >" . $linha[0] . "</td>" );
			echo("<td align=\"center\" > <a href=\"inserir_nota_falta.php?cod_turma=" . $_GET['cod_turma']. "&num_turma=" . $_GET['num_turma'] . "&matric_aluno=" . $linha[0] . "&nome_disc=".$_GET['nome_disc']."\">" . $linha[1] . "</a></td>" );
			echo("</tr>");
		}
		echo("</table>");
	}
	else{
		echo("<p align=\"center\"><br/>Nao ha alunos cadastrados");
	}

?>
