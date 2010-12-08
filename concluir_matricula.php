<?

session_start();

$host  = "localhost"; 
$database = "sigahack";
$destino = "";

$sql = "insert into aluno_turma values ( '" . $_SESSION['usuario'] . "','" . $_GET['cod_disc'] . "','".$_GET['num_turma']. "', '0', '0')";

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
	header("Location: matricular.php?status=ok");
} 
else{
	header("Location: matricular.php?status=fuu" );
}


?>
