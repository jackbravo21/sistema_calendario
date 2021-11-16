<?php

include_once("Conexao.php");

class Areas extends Conexao
{

public function exibirAreas()
{
    $conecta = new Conexao();
    $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT descricao FROM area");

    $stmt->execute();

    while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
    {   
        ?><option><?php	     
        echo $lista["descricao"] . "<br>";
        ?></option><?php        
    }
}

public function checagem($id, $areaPost)
{
    $minuscula = strtolower($areaPost);
    $area = ucfirst($minuscula);

    $conecta = new Conexao();
    $conecta->conectar();

    $stmt_check = $conecta->conectar()->prepare("SELECT descricao FROM area WHERE descricao = :AREA");

    $stmt_check->bindParam(":AREA", $area);

    $stmt_check->execute();

    //contar resultados
    $contar_resultados = $stmt_check->rowCount();

    /////////////////////

    $stmt_verify = $conecta->conectar()->prepare("SELECT * FROM melhorias WHERE area = :ID");

    $stmt_verify->bindParam(":ID", $id);

    $stmt_verify->execute();

    $verifica_resultados = $stmt_verify->rowCount();

    if($contar_resultados>0)
    {
        $checagem = 1;
        return $checagem;
    }

    else if($verifica_resultados>0)
    {
        $checagem = 2;
        return $checagem;
    }

}

    public function exibirArea()
    {

    $conecta = new Conexao();
    $conectar = $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT * FROM area");

            $stmt->execute();

            $lista = array();

        //////////////////////////////////////////////

        while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            include_once("./views/areasexibir.php");
        }
        //////////////////////////////////////////////

    }

    public function inserirArea($areaPost)
    {
        $minuscula = strtolower($areaPost);
        $area = ucfirst($minuscula);
        
        $conecta_v = new Conexao();
		$conecta_v->conectar();

        //////////////////////////////////

        $stmt_check = $conecta_v->conectar()->prepare("SELECT descricao FROM area WHERE descricao = :AREA");

		$stmt_check->bindParam(":AREA", $area);

		$stmt_check->execute();

		//contar resultados
		$contar_resultados = $stmt_check->rowCount();

		if($contar_resultados>0)
		{

		echo "<script>alert('Esta Área já está cadastrada!'); location.replace('?path=inicio');</script>";

		}

        /////////////////////////////////
        else
        {

        $conecta = new Conexao();
        $conecta->conectar();

		$stmt = $conecta->conectar()->prepare("INSERT INTO area (descricao) VALUES( :AREA )");

		$stmt->bindParam(":AREA", $area);

		$stmt->execute();

		echo "<script>alert('Area Adicionada!'); location.replace('?path=inicio');</script>";

        //echo $area . " cadastrado maluco!";

        }
    }

    public function editarArea($id)
    {
        $conecta_v = new Conexao();
		$conecta_v->conectar();

        $stmt = $conecta_v->conectar()->prepare("SELECT * FROM area WHERE id = :ID");

		$stmt->bindParam(":ID", $id);

		$stmt->execute();

        while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            include_once("./views/areaseditar.php");
        }
    }

    public function salvarEdicao($id, $areaPost)
    {
        $minuscula = strtolower($areaPost);
        $area = ucfirst($minuscula);

        /////////////////////

        $check = new Areas();
        $verify = $check->checagem($id, $areaPost);

		if($verify==1)
		{
            echo "<script>alert('Esta Área já está cadastrada!'); location.replace('?path=inicio');</script>";
        }
        
        else if($verify==2)
		{
            echo "<script>alert('Esta Área não pode ser editada, pois tem tarefas cadastradas!'); location.replace('?path=inicio');</script>";
        }

        else
        {
            $conecta = new Conexao();
            $conecta->conectar();
            
            $stmt = $conecta->conectar()->prepare("UPDATE area SET descricao = :AREA WHERE id = :ID");
    
            $stmt->bindParam(":AREA", $area);
            $stmt->bindParam(":ID", $id);

            $stmt->execute();
    
            echo "<script>alert('Area Editada!'); location.replace('?path=inicio');</script>";
        }
    }

    public function excluirArea($id)
    {
        $conecta_v = new Conexao();
		$conecta_v->conectar();

        $stmt = $conecta_v->conectar()->prepare("SELECT * FROM area WHERE id = :ID");

		$stmt->bindParam(":ID", $id);

		$stmt->execute();

        while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            include_once("./views/areaexcluir.php");
        }
    }

    public function salvarExclusao($id, $areaPost)
    {
        $minuscula = strtolower($areaPost);
        $area = ucfirst($minuscula);

        /////////////////////

        $check = new Areas();
        $verify = $check->checagem($id, $areaPost);

        if($verify==1 || $verify==2)
		{
            echo "<script>alert('Esta Área não pode ser excluida, pois tem tarefas cadastradas!'); location.replace('?path=inicio');</script>";
        }

        else
        {
            $conecta = new Conexao();
            $conecta->conectar();
            
            $stmt = $conecta->conectar()->prepare("DELETE FROM area WHERE id = :ID");
    
            $stmt->bindParam(":ID", $id);

            $stmt->execute();
    
            echo "<script>alert('Area Excluida!'); location.replace('?path=inicio');</script>";
        }
    }
    
    public function selecionarIdArea($descricao)
    {

    $conecta = new Conexao();
    $conectar = $conecta->conectar();

    $stmt = $conecta->conectar()->prepare("SELECT * FROM area WHERE descricao = :DESCRICAO");

    $stmt->bindParam(":DESCRICAO", $descricao);
    
    $stmt->execute();

    $lista = array();

        //////////////////////////////////////////////

        while($lista = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            return $lista["id"];
        }
        //////////////////////////////////////////////

    }

}


?>