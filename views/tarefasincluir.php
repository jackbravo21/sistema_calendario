

<div class="container container-fluid col-6">

<div class="panel panel-primary">
	<div class="panel panel-heading">
		<center><h4><b>Cadastrar nova Tarefa:</b></h4></center>
	</div>
<div class="panel-body" width="95%">
				
<form action="index.php?path=tarefas" name="inserir_tarefa" method="post">
    <label class="mt-2">Área:</label>
    <select class="form-control fluid" name="area" id="area" required>
			<option value="default">Informar a área</option>
            <?php
            include_once("dao/Areas.php");
            $area = new Areas();
            $area->exibirAreas();
            ?>
	</select>
    <label class="mt-2">Tarefa:</label>
    <textarea name="tarefa" id="tarefa" rows="3" type="text" class="form-control" placeholder="Tarefa" maxlength="255" required></textarea>
    <label class="mt-2">Descrição:</label>
    <textarea name="descricao" id="descricao" rows="3" type="text" class="form-control" placeholder="Descrição" maxlength="255" required></textarea>
    <label class="mt-2">Prazo legal:</label>
    <input type="date" class="form-control" name="prazolegal" id="prazolegal" placeholder="Prazo legal" min="<?php echo date("Y-m-d"); ?>" max="2021-12-31">
    <label class="mt-2">Prazo acordado:</label>
    <input type="date" class="form-control" name="prazoacordado" id="prazoacordado" placeholder="Prazo acordado" min="<?php echo date("Y-m-d"); ?>" max="2021-12-31" required>
    <label class="mt-2">Gravidade:</label>
    <select class="form-control fluid" name="gravidade" id="gravidade" default="Não informado" required>
			<option value="default">Não informado</option>
            <?php $tarefa->gravidade(); ?>
	</select>
    <label class="mt-2">Urgência:</label>
    <select class="form-control fluid" name="urgencia" id="urgencia" default="Não informado" required>
			<option value="default">Não informado</option>
            <?php $tarefa->urgencia(); ?>
	</select>
    <label class="mt-2">Tendência:</label>
    <select class="form-control fluid" name="tendencia" id="tendencia" default="Não informado" required>
			<option value="default">Não informado</option>
            <?php $tarefa->tendencia(); ?>
	</select>
    
    
    <div class="form-group mt-4">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="demandalegal" name="demandalegal">
      <label class="form-check-label" for="gridCheck">
        Demanda legal
      </label>
    </div>
  </div>

<br>
	<center>
<input type="submit" name="BTN_inserir_tarefa" id="BTN_inserir_tarefa" value="Cadastrar" class="btn btn-primary">
<input type="reset" value="Limpar Dados" class="btn btn-danger float-right mr-2">
	</center>
				</form>
			</div>
<br><br>




<br><br><br><br><br>

