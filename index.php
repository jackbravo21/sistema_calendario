<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

if(!file_exists('vendor/autoload.php')) {
    die('Instale as dependencias');
}

include_once 'vendor/autoload.php';

///////////////////////////////////////////////////////////////

if(empty($_GET)){
  header('Location:?path=inicio');
  }
  
else if(!isset($_GET["path"]))
{
  include_once("./views/top.php");
  echo "<center><h1>ERRO 404</h1><br>Página não encontrada!</center>";
  ?>
  <br><br>
  <center><a href="?path=inicio"><button type="button" id="btn_buscar" class="btn btn-primary">Voltar</button></a></center>
  <?php
}
  
else if(isset($_GET["path"]) && $_GET["path"]=="inicio")
{
  include_once("./views/top.php");
?>


<div class="position-relative" style="margin-top: 20px">
    <?php
        if(!empty($_GET['path'])) {
          include_once ('views/'. $_GET['path'] . '.php');
        }

}

else if(isset($_GET["path"]) && $_GET["path"]=="inicio" || $_GET["path"]=="agenda")
{
  include_once("./views/top.php");?>

  <div class="position-relative" style="margin-top: 20px">
      <?php
          if(!empty($_GET['path'])) {
            include_once ('views/'. $_GET['path'] . '.php');
          }
  
}

else if(isset($_GET["path"]) && $_GET["path"]!="inicio" && $_GET["path"]!="agenda" && $_GET["path"]!="areas" && $_GET["path"]!="tarefas")
{
  include_once("./views/top.php");
  include_once("./views/errors.php");
}

else if(isset($_GET["path"]) && $_GET["path"]=="areas")
{
  include_once("./views/top.php");
  include_once("./views/areas.php");
}

else if(isset($_GET["path"]) && $_GET["path"]=="tarefas")
{
  include_once("./views/top.php");
  include_once("views/tarefas.php");
}

else
{
  header('Location:?path=inicio');
}

include_once("./views/bot.php");