<html>
<head>
</head>
<body>
<?php
  require_once('view/topo.php');
  require_once('view/menu.php');
  require_once('view/conteudo.php');
  require_once('view/base.php');
?>
<header>TOPO</header>
<div class='content'>
<nav>
<a href="?modulo=dashboard&acao=ver"> DASHBOARD</a> | 
<a href="?modulo=produto&acao=listar"> PRODUTO LISTAR</a> | 
<a href="?modulo=produto&acao=adicionar"> PRODUTO ADICIONAR</a> | 
<a href="?modulo=cliente&acao=listar"> CLIENTE LISTAR</a> | 
<a href="?modulo=cliente&acao=adicionar"> CLIENTE ADICIONAR</a> | 
</nav>

<?php
if(isset($_GET['modulo'])){ $modulo = $_GET['modulo'];}else{ $modulo = "dashboard"; }
if(isset($_GET['acao'])){ $acao = $_GET['acao'];}else{ $acao = "ver"; }

include("modulos/".$modulo."/".$acao.".php");
        
?>

</div>
<footer>RODAPE</footer>
</body>
</html>