
  

    <div class="container container-fluid col-6">

<div class="panel panel-primary">
			<div class="panel panel-heading">
				<center><h4><b>Esta área será excluída:</b></h4></center>
			</div>
<div class="panel-body" width="95%">
				
<form action="index.php?path=areas" name="excluir_area" method="post">

	<input type="hidden" class="form-control" name="idarea" id="idarea" aria-describedby="emailHelp" placeholder="<?php echo $lista["id"] ?>" value="<?php echo $lista["id"]; ?>" required>
    <input type="hidden" class="form-control" name="excluirarea" id="editararea" aria-describedby="emailHelp" placeholder="<?php echo $lista["descricao"] ?>" value="<?php echo $lista["descricao"]; ?>" required>
	<br>
	<center><h2 style="color:red">"<?php echo $lista["descricao"];?>"</h2></center>
	
<br>
	<center>
	<input type="submit" name="BTN_excluir" id="BTN_excluir" value="Excluir" class="btn btn-danger">
	<a href="?path=inicio"><input type="button" name="btn_voltar" value="Cancelar" class="btn btn-success"></a>
	</center>
				</form>
			</div>

<br>

<small id="aviso" class="form-text text-muted float-right">*Este cadastro não pode ter tarefas vinculadas.</small>

<br><br><br><br><br>





