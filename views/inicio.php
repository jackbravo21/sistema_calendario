<?php

use DAO\Area;

$areas = Area::getInstance()->order('descricao')->getAll();
$meses = [];

for($m = 1; $m <= 12; $m++) {
  $meses[] = (object)[
    'id'         => $m,
    'descricao'  => date('F', mktime(0, 0, 0, $m)),
  ];
}

?>
<div class="container" id="agenda">
  <form class="col-sm-12 col-md-6">
    <div class="form-row">
      <div class="form-group col-sm-12">
        <label for="area">Áreas</label>
        <select class="form-control" id="area">
          <option value="0">Selecione</option>
        <?php foreach ($areas as $area) : ?>
          <option value="<?php echo $area->id; ?>"><?php echo $area->descricao; ?></option>
        <?php endforeach; ?>
        </select>
        <small id="areaHelp" class="form-text text-muted">Area de negócio da tarefa.</small>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-12 col-md-5">
        <label for="mes_inicio">Período</label>
        <select class="form-control" id="mes_inicio">
          <option value="0">Selecione</option>
          <?php foreach ($meses as $mes) : ?>
            <option value="<?php echo $mes->id; ?>"><?php echo $mes->descricao; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group col-sm-12 col-md-2">
        <div>&nbsp;</div>
        <div class="separador-texto-combos">à</div>
      </div>
      <div class="form-group col-sm-12 col-md-5">
        <label for="mes_fim">&nbsp;</label>
        <select class="form-control" id="mes_fim">
          <option value="0">Selecione</option>
          <?php foreach ($meses as $mes) : ?>
            <option value="<?php echo $mes->id; ?>"><?php echo $mes->descricao; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <button type="button" id="btn_buscar" class="btn btn-primary">Buscar</button>
  </form>
</div>
<script type="text/javascript">
  document.querySelector('#btn_buscar').addEventListener('click', function(ev) {

    var form        = document.querySelector('form');
    var fields      = form.elements;
    var qryString   = '?path=agenda';
    var filtroMeses = [];

let campo1 = document.getElementById("mes_inicio");
let opcaoTexto1 = campo1.options[campo1.selectedIndex].text;
let campo2 = document.getElementById("mes_fim");
let opcaoTexto2 = campo2.options[campo2.selectedIndex].text;

console.log(opcaoTexto1);
console.log(opcaoTexto2);

///////////////////////////////////
function prosseguir()
{
  for(let field of fields) {

if(field.value > 0) {

  switch(field.id) {
    case 'area':

      qryString += '&';
      qryString += field.id;
      qryString += '=';
      qryString += field.value;
      break;

    case 'mes_inicio':
                  
    case 'mes_fim':
      filtroMeses.push(field.value);
      break;
  }
}
}

if(filtroMeses.length > 0) {
qryString += '&meses='
qryString += filtroMeses.join('-');
}

location.href = qryString;

}
///////////////////////////////////

if(opcaoTexto1 < opcaoTexto2)
{
  prosseguir();
}

else if(opcaoTexto1 == "Selecione" && opcaoTexto2 == "Selecione")
{
  prosseguir();
}

else if(opcaoTexto1 == "Selecione" || opcaoTexto2 == "Selecione")
{
  console.log("Selecione ao menos um período inicial!");
  alert("Erro! Selecione ao menos o período inicial!");
}

else if(opcaoTexto1 > opcaoTexto2)
{
  console.log("Erro, data inicial é maior que a data final!");
  alert("Erro! A data inicial é maior que a data final! Favor selecionar a data final maior que a inicial!");
}

else
{
  console.log("Erro, datas iguais!");
  alert("Erro! Os períodos selecionados estão iguais! Favor selecionar a data final maior que a inicial!"); 
}

})
</script>
