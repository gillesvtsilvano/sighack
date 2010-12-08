<?
	$tipo = $_GET['tipo'];

	$host  = "localhost"; 
	$database = "sigahack";

	$sql = "select codigo_disc, num_turma, nome_disc from turma natural join disciplina where prof_turma = '" . $_SESSION['usuario'] . "'";

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
		echo("<td align=\"center\" width=\"7%\"> <b>Num </b></td>" );
		echo("<td align=\"center\" width=\"93%\"> <b>Nome </b></td>" );
		echo("</tr>" );
		while ( $linha = mysql_fetch_array( $confirmacao ) ) {
			echo("<tr>");
			echo("<td align=\"center\" >" . $linha[1] . "</td>" );
			echo("<td align=\"center\" > <a href=\"alunos_turma.php?cod_turma=" . $linha[0]. "&num_turma=" . $linha[1] . "&nome_disc=" . $linha[2] . "\">" . $linha[2] . "</a></td>" );
			echo("</tr>");
		}
		echo("</table>");
	}

?>
