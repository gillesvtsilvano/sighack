<?
	session_start();
	if( isset($_SESSION['usuario']) && isset($_SESSION['senha']) && isset($_SESSION['tipo']) ){
		if( $_SESSION['tipo'] == 1 )
			header("Location: inicio_admin.php");
		else if( $_SESSION['tipo'] == 2 )
			header("Location: inicio_prof.php");
		else if( $_SESSION['tipo'] == 3 )
			header("Location: inicio_aluno.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SigaHack - Login Professor</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <!-- **** stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style_1col_bottom.css" />
</head>

<body>
  <div id="main">
    <div id="logo"></div>
    <div id="menubar">
      <ul id="menu">
        <li><a class="current" href="index.php">Administrador</a></li>
	   <li><a class="current" href="login_prof.php">Professor</a></li>
	   <li><a class="current" href="login_aluno.php">Aluno</a></li>
      </ul>
    </div>
    <div id="site_content">
      <div id="content_container">
        <!-- rounded corners - top **** -->
        <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
        <div id="content">
          
		<div class="login" align="center">
		<h1>Login Professor</h1>
		<?
			if( $_GET['status'] == "fuu" ){
				echo("<font color=\"red\">Login ou senha invalidos</font>");
				echo("<br/><br/>");
			}
		?>
		<form method="post" action="valida.php?tipo=2">
		<table>
		  <tr>
			<td>Usuario:</td>
			<td><input type="text" name="usuario" maxlength="50"/></td>
		  <tr/>
		  <tr>
			<td>Senha:</td>
			<td><input type="password" name="senha" maxlength="20"/></td>
		  <tr/>
		  <tr>
			<td></td>
			<td><input type="submit" value="Login"/></td>
		  <tr/>
		  
		  <!--Senha <input type="password" /><br/><br/>
		  <input type="button" value="Login"/>-->
		</table>
		</form>
		</div>
        </div>
        <!-- rounded corners - bottom **** -->
        <div class="rbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
      </div>
      <div class="sidebar">
        
      </div>
    </div>
    <div id="footer">
      Copyright &copy; Grupo's Feto</a>
    </div>
  </div>
</body>
</html>
