<?php

include_once("./dao/Tarefas.php");

$tarefa = new Tarefas();

///////////////////////////////

if(!$_POST)
{
    include_once("tarefasincluir.php");
}
///////////////////////////////

else if(isset($_POST["BTN_inserir_tarefa"]))
{
   
    $area           =     $_POST["area"];
    $tarefa         =     $_POST["tarefa"];
    $descricao      =     $_POST["descricao"];
    $prazolegal     =     $_POST["prazolegal"];
    $prazoacordado  =     $_POST["prazoacordado"];
    $gravidade      =     $_POST["gravidade"];
    $urgencia       =     $_POST["urgencia"];
    $tendencia      =     $_POST["tendencia"];

    if(isset($_POST["demandalegal"])) 
    {
        $demandalegal    = True;
    }
    else
    {
        $demandalegal    = False;
    }

    $inserir = new Tarefas();
    $inserir->adicionarTarefas($area, $tarefa, $descricao, $prazolegal, $prazoacordado, $gravidade, $urgencia, $tendencia, $demandalegal);
    

}

echo "<br><br>==============================================<br><br>";
$tarefa->showTarefas();

?>