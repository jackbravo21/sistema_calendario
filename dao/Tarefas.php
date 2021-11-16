<?php

include_once("Conexao.php");

class Tarefas extends Conexao
{

    protected $area;
    protected $tarefa;
    protected $descricao;
    protected $prazolegal;
    protected $prazoacordado;
    protected $gravidade;
    protected $urgencia;
    protected $tendencia;
    protected $demandalegal;

    public function gravidade()
    {
        $opcoes = ["Sem gravidade", "Pouco grave", "Grave", "Muito grave", "Extremamente grave"];

        foreach ($opcoes as $valor) {
            ?><option><?php	
			echo $valor . "<br>"; 
			?></option><?php
        }
    }

    public function urgencia()
    {
        $opcoes = ["Pode esperar", "Pouco urgente", "Merece atenção, curto prazo", "Muito urgente", "Precisa ação imediata"];

        foreach ($opcoes as $valor) {
            ?><option><?php	
			echo $valor . "<br>"; 
			?></option><?php
        }
    }

    public function tendencia()
    {
        $opcoes = ["Não irá mudar", "Piora em longo prazo", "Piora em médio prazo", "Piora em curto prazo", "Piora rapidamente"];

        foreach ($opcoes as $valor) {
            ?><option><?php	
			echo $valor . "<br>"; 
			?></option><?php
        }
    }

    public function adicionarTarefas($area, $tarefa, $descricao, $prazolegal, $prazoacordado, $gravidade, $urgencia, $tendencia, $demandalegal)
    {
        
        if($area == "default")
        {
            echo "<script>alert('Erro! Nenhuma área selecionada! Favor selecionar alguma área!'); location.replace('index.php?path=tarefas');</script>";
        }
        
        else
        {
            if($gravidade == "default" && $urgencia == "default" && $tendencia == "default")
            {
                echo "<script>alert('Erro! Favor selecionar pelo menos uma gravidade, urgência ou tendência!'); location.replace('index.php?path=tarefas');</script>";
            }

            else
            {
                if($_POST["gravidade"] == "default")
                {
                    $gravidade      = "Não informado";
                }
                else
                {
                    $gravidade      = $_POST["gravidade"];
                }
                
                if($_POST["urgencia"] == "default")
                {
                    $urgencia       = "Não informado";
                }
                else
                {
                    $turgencia       = $_POST["urgencia"];
                }
            
                if($_POST["tendencia"] == "default")
                {
                    $tendencia      = "Não informado";
                }
                else
                {
                    $tendencia      = $_POST["tendencia"];
                }

                if($demandalegal == "1"){
                    $demandalegal == "1";
                }
                else{
                    $demandalegal == "0";
                }

                include_once("./dao/Areas.php");
                $checkareas = new Areas();
                $idArea = $checkareas->selecionarIdArea($area);
                                
                ///////////////////////////////////////////////////

                $conecta = new Conexao();
                $conecta->conectar();
        
                $stmt = $conecta->conectar()->prepare("INSERT INTO melhorias (tarefa, descricao, demanda_legal, prazo_acordado, prazo_legal, gravidade, urgencia, tendencia, area) 
                VALUES( :TAREFA,  :DESCRICAO, :DEMANDALEGAL, :PRAZOACORDADO, :PRAZOLEGAL, :GRAVIDADE, :URGENCIA, :TENDENCIA, :AREA)");
        
                $stmt->bindParam(":AREA", $idArea);
                $stmt->bindParam(":TAREFA", $tarefa);
                $stmt->bindParam(":DESCRICAO", $descricao);
                $stmt->bindParam(":PRAZOLEGAL", $prazolegal);
                $stmt->bindParam(":PRAZOACORDADO", $prazoacordado);
                $stmt->bindParam(":GRAVIDADE", $gravidade);
                $stmt->bindParam(":URGENCIA", $urgencia);
                $stmt->bindParam(":TENDENCIA", $tendencia);
                $stmt->bindParam(":DEMANDALEGAL", $demandalegal);
                        
                $stmt->execute();
        
                echo "<script>alert('Tarefa Adicionada!'); location.replace('?path=inicio');</script>";
/*
                echo "Id: ". $idArea . "<br>";
                echo "Tarefa: ". $tarefa . "<br>";
                echo "Descricao: ". $descricao . "<br>";
                echo "Prazo legal: ". $prazolegal . "<br>";
                echo "Prazo acordado". $prazoacordado . "<br>";
                echo "Gravidade: ". $gravidade . "<br>";
                echo "Urgencia: ". $urgencia . "<br>";
                echo "Tendencia: ". $tendencia . "<br>";
                echo "Demanda legal: ". $demandalegal . "<br>";
*/
            }


        }

    }













//////////////////////////////////////////////////

    public function showTarefas()
    {

    $conecta = new Conexao();
    $conectar = $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT * FROM melhorias");

            $stmt->execute();

            $lista = array();

        //////////////////////////////////////////////

        while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo "ID: " . $lista['id'] . "<br>";
            echo "Tarefa: " . $lista['tarefa'] . "<br>";
            echo "Descricao: " . $lista['descricao'] . "<br>";
            echo "Demanda Legal: " . $lista['demanda_legal'] . "<br>";
            echo "Prazo Acordado: " . $lista['prazo_acordado'] . "<br>";
            echo "Prazo Legal: " . $lista['prazo_legal'] . "<br>";
            echo "Gravidade: " . $lista['gravidade'] . "<br>";
            echo "Urgencia: " . $lista['urgencia'] . "<br>";
            echo "Tendencia: " . $lista['tendencia'] . "<br>";
            echo "Area: " . $lista['area'] . "<br>
            ------------------------------------<br><br>";

        }
        //////////////////////////////////////////////

    }

}

?>