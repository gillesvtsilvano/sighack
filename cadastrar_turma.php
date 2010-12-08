<?
	session_start();
	if( !isset($_SESSION['usuario']) || !isset($_SESSION['senha']) || $_SESSION['tipo'] != 1 ){
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SigaHack - Cadastro de Turma</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <!-- **** stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="logo"></div>
    <div id="menubar">
      <ul id="menu">
        <li><a class="current" href="inicio_admin.php">Inicio</a></li>
      </ul>
      
    </div>
    <div id="logout">
      <ul id="menulogout">
        <li><a class="current" href="logout.php">Logout</a></li>
      </ul>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <?
		include("menus_admin.php");
	   ?>
      </div>
      <div id="content_container">
        <!-- rounded corners - top **** -->
        <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
        <div id="content">
          <br/><h1 align="center">Cadastro de Turma</h1>
		<div align="center">
		<?
			if( $_GET['status'] == "ok" ){
				echo("<font color=\"blue\">Cadastro realizado com sucesso!</font>");
			}
			else if( $_GET['status'] == "fuu" ){
				echo("<font color=\"red\">Erro no cadastro.<br/>Tente novamente. Em caso de persistência do erro, contacte Grupos Feto</font>");
			}
			else if( $_GET['status'] == "fd" ){
				echo("<font color=\"red\">Forneca todos os dados</font>");
			}
			echo("<br/><br/>");
		?>
		<form method="post" action="cadastro.php?tipo_cadastro=4">
		  <table>
		    <tr>
			  <td>Codigo Disciplina:</td>
			  <td>
                   <select name="codigo_disc">
				 <?
                     include( "lista_disc.php" );
				  ?>
                   </select>
			  </td>
		    <tr/>
		    <tr>
			  <td>Numero:</td>
			  <td><input type="text" name="num_turma" size="2" maxlength="2"/></td>
		    <tr/>
		    <tr>
			  <td>Sala:</td>
			  <td><input type="text" name="sala_turma" size="20" maxlength="20"/></td>
		    <tr/>
              <tr>
			  <td>Horario:</td>
			  <td><input type="text" name="h_turma" size="13" maxlength="13"/></td>
		    <tr/>
			<tr>
			  <td>Professor:</td>
			  <td>
                   <select name="prof_turma">
				 <?
                     include( "lista_prof.php" );
				  ?>
                   </select>
			  </td>
		    <tr/>
		    <tr>
			  <td></td>
			  <td><input type="submit" value="Cadastrar"/></td>
		    <tr/>
		  
		  </table>
		</form>
		</div>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
          <!-- **** INSERT PAGE CONTENT HERE **** -->
          
        </div>
        <!-- rounded corners - bottom **** -->
        <div class="rbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
      </div>
    </div>
    <div id="footer">
      Copyright &copy; Grupo's Feto</a>
    </div>
  </div>
</body>
</html>
