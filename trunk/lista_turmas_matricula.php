<?
	$host  = "localhost"; 
	$database = "sigahack";

	$sql = "select codigo_disc, num_turma, horario, ch, nome_disc, nome_dept from( turma natural join disciplina ) join departamento where dept_disc=codigo_dept order by dept_disc";

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
	
	$sql = "select sum(ch) from (disciplina join aluno_turma) natural join turma where codigo_disc=codigo_turma && matricula_aluno='".$_SESSION['usuario']."'";
	$confirmacao2 = mysql_query( $sql, $db )
			or die("Erro ao realizar consulta na base de dados.<br/>
				<a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto");

	$total_horas = mysql_fetch_array( $confirmacao2 );

	echo("Maximo de horas possivel: 510 horas");
	echo("<br/>Quantidade de horas matriculadas: ". $total_horas[0] . "<br/>");
 

	if( $contagem > 0 ){
		
		
		echo("<table width=\"100%\" border=\"1px\" >");
		echo("<tr>" );
		echo("<td align=\"center\" width=\"10%\"> <b>Codigo </b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Num </b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Horario</b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>CH</b></td>" );
		echo("<td align=\"center\" width=\"40%\"> <b>Nome</b></td>" );
		echo("<td align=\"center\" width=\"40%\"> <b>Dept</b></td>" );
		echo("<td align=\"center\" width=\"5%\"> <b>Acao</b></td>" );
		echo("</tr>" );
		while ( $linha = mysql_fetch_array( $confirmacao ) ) {
			$sql = "select * from aluno_turma where codigo_turma='" . $linha[0] . "' && matricula_aluno=". $_SESSION['usuario']."";
			//echo($sql."<br/><br/>");
			$resultado = mysql_query( $sql, $db )
			or die("Erro ao realizar consulta na base de dados.<br/>
				<a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
				Caso o erro persista, contacte Grupo's Feto</table>");
			echo("<tr>");
			echo("<td align=\"center\" >" . $linha[0] . "</td>" );
			echo("<td align=\"center\" >" . $linha[1] . "</td>" );
			echo("<td align=\"center\" >" . $linha[2] . "</td>" );
			echo("<td align=\"center\" >" . $linha[3] . "</td>" );
			echo("<td align=\"center\" >" . $linha[4] . "</td>" );
			echo("<td align=\"center\" >" . $linha[5] . "</td>" );
			if( mysql_num_rows($resultado) == 0 && $total_horas[0] < 510 ){
				echo("<td align=\"center\" > <a href=\"concluir_matricula.php?&cod_disc=" . $linha[0] . "&num_turma=". $linha[1] ."\"> matricular </a></td>" );
			}
			else{
				echo("<td align=\"center\" > matricular</td>" );
			}
			
			echo("</tr>");
		}
		echo("</table>");
	}

?>
