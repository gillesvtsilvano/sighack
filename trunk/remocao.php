<?

$tipo_remocao = $_GET['tipo_remocao'];

$host  = "localhost"; 
$database = "sigahack";
$destino = "";
$sql = "";

if( $tipo_remocao == 1 ){
	$destino = "remover_dept.php";
	$sql = "delete from departamento where codigo_dept='".$_GET['cod_dept']."'";
}
else if( $tipo_remocao == 2 ){
	$destino = "remover_curso.php";
	$sql = "delete from curso where codigo_curso='".$_GET['cod_curso']."'";
}
else if( $tipo_remocao == 3 ){
	$destino = "remover_disc.php";
	$sql = "delete from disciplina where codigo_disc='".$_GET['cod_disc']."'";
}
else if( $tipo_remocao == 4 ){
	$destino = "remover_turma.php";
	$sql = "delete from turma where codigo_disc='".$_GET['cod_disc']."'";

}
else if( $tipo_remocao == 5 ){
	$destino = "remover_prof.php";
	$sql = "delete from professor where matricula_prof='".$_GET['matric_prof']."'";

}
else{
	$destino = "remover_aluno.php";
	$sql = "delete from aluno where matricula_aluno='".$_GET['matric_aluno']."'";
}

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


?>
