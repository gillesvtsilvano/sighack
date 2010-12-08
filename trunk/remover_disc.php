<?
	session_start();
	if( !isset($_SESSION['usuario']) || !isset($_SESSION['senha']) || $_SESSION['tipo'] != 1 ){
		header("Location: login_prof.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SigaHack - Remocao Disciplina</title>
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
		include("menus_admin.php");
	   ?>
      </div>
      <div id="content_container">
        <!-- rounded corners - top **** -->
        <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
        <div id="content">
          <br/><h1 align="center">Disciplinas</h1>
		<p align="center">
		<?
			if( $_GET['status'] == "ok" ){
				echo("<font color=\"blue\">Remocao realizada com sucesso!</font>");
			}
			else if( $_GET['status'] == "fuu" ){
				echo("<font color=\"red\">Erro na remocao.<br/>Tente novamente. Em caso de persistencia do erro, contacte Grupos Feto</font>");
			}
			echo("<br/><br/>");
		?>
		<?
		include("tabela_remocao_disc.php");
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
