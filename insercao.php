<?

$host  = "localhost"; 
$database = "sigahack";
$destino = "";
$sql = "";

$preencheu_dados = $_POST['nota'] != "" && $_POST['faltas'] != "";

$sql = "update aluno_turma set nota='".$_POST['nota']."', faltas='".$_POST['faltas']."' where matricula_aluno='".$_GET['matric_aluno']."' && codigo_turma='".$_GET['cod_turma']."' && num_turma='".$_GET['num_turma']."'";

if( !$preencheu_dados ){
	header("Location: inserir_nota_falta.php?status=fd&matric_aluno=".$_GET['matric_aluno']."&cod_turma=".$_GET['cod_turma']."&num_turma=".$_GET['num_turma']."&nome_disc=".$_GET['nome_disc']);
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
		header("Location: alunos_turma.php?status=ok&cod_turma=".$_GET['cod_turma']."&num_turma=".$_GET['num_turma']."&nome_disc=".$_GET['nome_disc']);
	} 
	else{
		header("Location: alunos_turma.php?status=fuu" );
	}
}

?>
