
  

    <div class="container container-fluid col-6">

<div class="panel panel-primary">
			<div class="panel panel-heading">
				<center><h4><b>Editar Área:</b></h4></center>
			</div>
<div class="panel-body" width="95%">
				
<form action="index.php?path=areas" name="editar_area" method="post">

    <small id="aviso" class="form-text text-muted float-right">Não insira cadastros repetidos.</small>
	<input type="hidden" class="form-control" name="idarea" id="idarea" aria-describedby="emailHelp" placeholder="<?php echo $lista["id"] ?>" value="<?php echo $lista["id"]; ?>" required>
    <input type="text" class="form-control" name="editararea" id="editararea" aria-describedby="emailHelp" placeholder="<?php echo $lista["descricao"] ?>" value="<?php echo $lista["descricao"]; ?>" required>
<br>
	<center>
<input type="submit" name="BTN_editar" id="BTN_editar" value="Editar" class="btn btn-primary">
	</center>
				</form>
			</div>
<br><br>


<br><br><br><br><br>





