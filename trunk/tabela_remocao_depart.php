<?
	$tipo = $_GET['tipo'];

	$host  = "localhost"; 
	$database = "sigahack";

	$sql = "select * from departamento";

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
		echo("<td align=\"center\" width=\"12%\"> <b>Codigo </b></td>" );
		echo("<td align=\"center\" width=\"76%\"> <b>Nome </b></td>" );
		echo("<td align=\"center\" width=\"12%\"> <b>Acao </b></td>" );
		echo("</tr>" );
		while ( $linha = mysql_fetch_array( $confirmacao ) ) {
			$sql = "select * from professor, curso, disciplina where dept_prof='".$linha[0]."' || dept_curso='".$linha[0]."' || dept_disc='".$linha[0]."'";
			$resultado = mysql_query( $sql, $db )
			or die("Erro ao realizar consulta na base de dados.<br/>
				<a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto</table>");
			echo("<tr>");
			echo("<td align=\"center\" >" . $linha[0] . "</td>" );
			echo("<td align=\"center\" >"  . $linha[1] . "</td>" );
			if( mysql_num_rows($resultado) == 0 ){
				echo("<td align=\"center\" > <a href=\"remocao.php?tipo_remocao=1&cod_dept=" . $linha[0] . "\"> remover </a></td>" );
			}
			else{
				echo("<td align=\"center\" >remover </td>" );
			}
			echo("</tr>");
		}
		echo("</table>");
	}
	else{
		echo("Nao ha departamentos cadastrados");
	}

?>
