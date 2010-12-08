<?

$tipo = $_GET['tipo'];

$host  = "localhost"; 
$database = "sigahack";

$sql = "";

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

if( $tipo == 1 ){ 
	$sql = "select * from administrador where usuario = '$usuario' and senha = '$senha' ";
}
else if( $tipo == 2 ){
	$sql = "select * from professor where matricula_prof = '$usuario' and senha_prof = '$senha' ";
}
else if( $tipo == 3 ){
	$sql = "select * from aluno where matricula_aluno = '$usuario' and senha_aluno = '$senha' ";
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

$confirmacao = mysql_query( $sql, $db )
		or die("Erro ao realizar consulta na base de dados.<br/>
			   <a href=javascript:history.go(-1)>Clique aqui tentar novamente.</a><br/>
			   Caso o erro persista, contacte Grupo's Feto");

$contagem = mysql_num_rows($confirmacao);

echo($contagem);

if ( $contagem == 1 ) {
	session_start();
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['tipo'] = $tipo;

	$destino = "";

	if( $tipo == 1 ) 
		$destino  = "inicio_admin.php"; 
	else if( $tipo == 2 )
		$destino  = "inicio_prof.php"; 
	else if( $tipo == 3 )
		$destino  = "inicio_aluno.php"; 

	header("Location: " . $destino );

} 
else{
	if( $tipo == 1 ) 
		$destino  = "index.php?status=fuu"; 
	else if( $tipo == 2 )
		$destino  = "login_prof.php?status=fuu"; 
	else if( $tipo == 3 )
		$destino  = "login_aluno.php?status=fuu"; 

	header("Location: " . $destino );
	//echo "Login ou senha inválidos. <a href=javascript:history.go(-1)>Clique aqui para voltar.</a>";
}


?>
