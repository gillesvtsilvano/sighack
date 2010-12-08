<?

$tipo_cadastro = $_GET['tipo_cadastro'];

$host  = "localhost"; 
$database = "sigahack";
$destino = "";
$sql = "";
$preencheu_dados = false;

if( $tipo_cadastro == 1 ){
	$destino = "cadastrar_dept.php";
	$sql = "insert into departamento values('" . $_POST['codigo_dept'] . "','" . $_POST['nome_dept'] . "')";
	$preencheu_dados = $_POST['codigo_dept'] != "" && $_POST['nome_dept'] != "";
}
else if( $tipo_cadastro == 2 ){
	$destino = "cadastrar_curso.php";
	$sql = "insert into curso values('" . $_POST['codigo_curso'] . "','" . $_POST['nome_curso'] . "','" . $_POST['dept_curso'] . "' )";
	$preencheu_dados = $_POST['codigo_curso'] != "" && $_POST['nome_curso'] != "" && $_POST['dept_curso'] != "";
}
else if( $tipo_cadastro == 3 ){
	$destino = "cadastrar_disc.php";
	$sql = "insert into disciplina values('" . $_POST['codigo_disc'] . "','" . $_POST['nome_disc'] . "','" . $_POST['ch_disc'] . "','" . $_POST['dept_disc'] . "' )";
	$preencheu_dados = $_POST['codigo_disc'] != "" && $_POST['nome_disc'] != "" && $_POST['ch_disc'] != "" && $_POST['dept_disc'] != "";
}
else if( $tipo_cadastro == 4 ){
	$destino = "cadastrar_turma.php";
	$sql = "insert into turma values('" . $_POST['codigo_disc'] . "','" . $_POST['num_turma'] . "','" . $_POST['sala_turma'] . "','" . $_POST['h_turma'] . "','" . $_POST['prof_turma'] . "')";
	$preencheu_dados = $_POST['codigo_disc'] != "" && $_POST['num_turma'] != "" && $_POST['sala_turma'] != "" && $_POST['h_turma'] != "" && $_POST['prof_turma'] != "";
}
else if( $tipo_cadastro == 5 ){
	$destino = "cadastrar_prof.php";
	$sql = "insert into professor values('" . $_POST['matric_prof'] . "','" . $_POST['senha_prof'] . "','" . $_POST['nome_prof'] . "','" . $_POST['cpf_prof'] . "','" . $_POST['dept_prof'] . "')";
	$preencheu_dados = $_POST['matric_prof'] != "" && $_POST['senha_prof'] != "" && $_POST['nome_prof'] != "" && $_POST['cpf_prof'] != "" && $_POST['dept_prof'] != "";
}
else{
	$destino = "cadastrar_aluno.php";
	$sql = "insert into aluno values('" . $_POST['matric_aluno'] . "','" . $_POST['senha_aluno'] . "','" . $_POST['nome_aluno'] . "','" . $_POST['cpf_aluno'] . "','" . $_POST['curso_aluno'] . "')";
	$preencheu_dados = $_POST['matric_aluno'] != "" && $_POST['senha_aluno'] != "" && $_POST['nome_aluno'] != "" && $_POST['cpf_aluno'] != "" && $_POST['curso_aluno'] != "";
}

if( !$preencheu_dados ){
	header("Location: " . $destino . "?status=fd");
}
else{
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

	$confirmacao = mysql_query($sql, $db)
			or die("Erro ao realizar consulta na base de dados.<br/>
			   <a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
			   Caso o erro persista, contacte Grupo's Feto");

	if ( $confirmacao == 1 ) {
		$destino = $destino . "?status=ok";
		header("Location: " . $destino );
	} 
	else{
		$destino = $destino . "?status=fuu";
		header("Location: " . $destino );
	}
}

?>
