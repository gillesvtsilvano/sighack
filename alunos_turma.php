<?
	session_start();
	if( !isset($_SESSION['usuario']) || !isset($_SESSION['senha']) || $_SESSION['tipo'] != 2 ){
		header("Location: login_prof.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SigaHack - Alunos Turmas</title>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <!-- **** stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="style/style.css" />
</head>

<body>
  <div id="main">
    <div id="logo"></div>
    <div id="menubar">
      <ul id="menu">
        <li><a class="current" href="inicio_prof.php" title="Sidebar - Left">Inicio</a></li>
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
		include("menus_prof.php");
	   ?>
      </div>
      <div id="content_container">
        <!-- rounded corners - top **** -->
        <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
        <div id="content">
		<br/><h1 align="center">Alunos da Turma</h1><br/>
		<p align="left">
		<?
		  echo("Disciplina: " . $_GET['nome_disc'] . "<br/>");
		  echo("Numero Turma: " . $_GET['num_turma'] . "<br/>");
		  if( $_GET['status'] == "ok" ){
		     echo("<p align=\"center\">");
			echo("<font color=\"blue\">Insercao realizada com sucesso!</font><br/><br/>");
			echo("</p>");
		  }
		  else if( $_GET['status'] == "fuu" ){
			echo("<p align=\"center\">");
			echo("<font color=\"red\">Erro na insercao.<br/>Tente novamente. Em caso de persistência do erro, contacte Grupos Feto</font><br/><br/>");
			echo("</p>");
		  }
		  include("lista_alunos_turma.php");
		?>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
          
        </div>
        <div class="rbottom"><div class="r4"></div><div class="r3"></div><div class="r2"></div><div class="r1"></div></div>
      </div>
    </div>
    <div id="footer">
      Copyright &copy; Grupo's Feto</a>
    </div>
  </div>
</body>
</html>