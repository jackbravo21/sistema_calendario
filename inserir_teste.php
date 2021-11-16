<?php

include_once("./dao/Conexao.php");

    $idArea = 6;
    $tarefa = "Teste 1";
    $descricao = "Realizar o teste 1";
    $prazolegal = date(2021-11-17);
    $prazoacordado = date(2021-11-30);
    $gravidade = "Sem gravidade";
    $urgencia = "Pouco urgente";
    $tendencia = "Não irá mudar";
    $demandalegal = TRUE;

    $conecta_v = new Conexao();
    $conecta_v->conectar();

    $stmt_check = $conecta_v->conectar()->prepare("SELECT * FROM melhorias");

    $stmt_check->execute();

    //contar resultados
    $contar_resultados = $stmt_check->rowCount();
    
    $idc = $contar_resultados+1;

try {

    $conecta = new Conexao();
    $conecta->conectar();
    $stmt = $conecta->conectar()->prepare("INSERT INTO melhorias (id, tarefa, descricao, demanda_legal, prazo_acordado, prazo_legal, gravidade, urgencia, tendencia, area) 
                VALUES(:ID, :TAREFA,  :DESCRICAO, :DEMANDALEGAL, :PRAZOACORDADO, :PRAZOLEGAL, :GRAVIDADE, :URGENCIA, :TENDENCIA, :AREA)");
        
                $stmt->bindParam(":ID", $idc);
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

    echo "Adicionado";            

            } catch (\Throwable $th) {
                //throw $th;
            }
    

?>