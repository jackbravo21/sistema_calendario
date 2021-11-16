<?php

include_once("dao/Areas.php");

if(isset($_POST["BTN_inserir"]))
{
    $areaPost	=	$_POST["novaarea"];
    $area = new Areas();
    $area->inserirArea($areaPost);
}

else if(isset($_POST["BTN_editar"]))
{
    $areaPost	=	$_POST["editararea"];
    $idPost     =   $_POST["idarea"];
    $area = new Areas();
    $area->salvarEdicao($idPost, $areaPost);
}

else if(isset($_POST["BTN_excluir"]))
{
    $areaPost	=	$_POST["excluirarea"];
    $idPost     =   $_POST["idarea"];
    $area = new Areas();
    $area->salvarExclusao($idPost, $areaPost);
}

if(!isset($_GET["editararea"]) && !isset($_GET["excluirarea"]))
{
    $area = new Areas();
    $area->exibirArea();
}

else if(isset($_GET["editararea"]) && $_GET["editararea"]=="true" && !isset($_GET["excluirarea"]))
{
    $id = $_GET["id"];    
    $area = new Areas();
    $area->editarArea($id);
}

else if(isset($_GET["excluirarea"]) && $_GET["excluirarea"]=="true" && !isset($_GET["editararea"]))
{
    $id = $_GET["id"];    
    $area = new Areas();
    $area->excluirArea($id);
}

?>


