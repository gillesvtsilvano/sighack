<?
	$tipo = $_GET['tipo'];

	$host  = "localhost"; 
	$database = "sigahack";
	
	$sql = "select matricula_prof, nome_prof, cpf_prof, dept_prof from professor where matricula_prof='".$_SESSION['usuario']."'";
	
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

	while ( $linha = mysql_fetch_array( $confirmacao ) ) {
		echo("Matricula: ".$linha[0]);
		echo("<br/>Nome: ".$linha[1]);
		echo("<br/>CPF: ".$linha[2]);
		echo("<br/>Departamento: ".$linha[3]);
	}
		
	
?>
