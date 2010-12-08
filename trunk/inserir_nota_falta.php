<?
	session_start();
	if( !isset($_SESSION['usuario']) || !isset($_SESSION['senha']) || $_SESSION['tipo'] != 2 ){
		header("Location: index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>SigaHack - Inserir nota final e faltas</title>
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
		include("menus_prof.php");
	   ?>
      </div>
      <div id="content_container">
        <!-- rounded corners - top **** -->
        <div class="rtop"><div class="r1"></div><div class="r2"></div><div class="r3"></div><div class="r4"></div></div>
        <div id="content">
          <br/><h1 align="center">Insira os dados</h1>
		<div align="center">
		<?
			if( $_GET['status'] == "ok" ){
				echo("<font color=\"blue\">Insercao realizada com sucesso!</font>");
			}
			else if( $_GET['status'] == "fuu" ){
				echo("<font color=\"red\">Erro na insercao.<br/>Tente novamente. Em caso de persistência do erro, contacte Grupos Feto</font>");
			}
			else if( $_GET['status'] == "fd" ){
				echo("<font color=\"red\">Forneca todos os dados</font>");
			}
			echo("<br/><br/>");
			echo("<form method=\"post\" action=\"insercao.php?cod_turma=".$_GET['cod_turma']."&num_turma=".$_GET['num_turma']."&matric_aluno=".$_GET['matric_aluno']."&nome_disc=".$_GET['nome_disc']."\">");
		?>
		
		  <table>
		    <tr>
			  <td>Nota Final:</td>
			  <td><input type="text" name="nota" size="5" maxlength="3"/></td>
		    <tr/>
		    <tr>
			  <td>Faltas:</td>
			  <td><input type="text" name="faltas" size="5" maxlength="3"/></td>
		    <tr/>
		    <tr>
			  <td></td>
			  <td><input type="submit" value="Inserir"/></td>
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
