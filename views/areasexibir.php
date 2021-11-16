
  

    <div class="container container-fluid col-6">

<div class="panel panel-primary">
			<div class="panel panel-heading">
				<center><h4><b>Cadastrar nova Área:</b></h4></center>
			</div>
<div class="panel-body" width="95%">
				
<form action="index.php?path=areas" name="inserir_area" method="post">

    <small id="aviso" class="form-text text-muted float-right">Não insira cadastros repetidos.</small>
    <input type="text" class="form-control" name="novaarea" id="novaarea" aria-describedby="emailHelp" placeholder="Nova Área" required>
<br>
	<center>
<input type="submit" name="BTN_inserir" id="BTN_inserir" value="Cadastrar" class="btn btn-primary">
	</center>
				</form>
			</div>
<br><br>


<h1 style="color:black"><b>Área:</b></h1>

<?php while($lista = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>


<table class="table table-striped fluid">
<tr>
  	<td><p><?php echo $lista['descricao']?></p></td>
<td class="float-right">
<a href="index.php?path=areas&editararea=true&id=<?php echo $lista['id'];?>"><i class="far fa-edit"></i></a>&nbsp &nbsp
<a href="index.php?path=areas&excluirarea=true&id=<?php echo $lista['id']; ?>" style="color:red"><i class="far fa-trash-alt"></i></a>

</td>
</tr>   
</table>

<?php 
}
?>

<br><br><br><br><br>





