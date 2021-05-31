<?php 
$acao = 'recuperar';
require 'tarefa_controller.php';

?>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lista Tarefas</title>

		<link rel="stylesheet" href="css/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <script>
         function editar(id_content, content){
           let form = document.createElement('form');
            form.action = '#';
            form.method = 'post';
            form.className = 'row';

           let inputTarefa = document.createElement('input');
            inputTarefa.type = 'text';
            inputTarefa.name = 'tarefa';
            inputTarefa.className = 'form-control col-7';
            inputTarefa.value = content;

            let input_id = document.createElement('input');
            input_id.type = 'hidden';
            input_id.name = 'id';
            input_id.value = id_content;

           let button = document.createElement('button');
           button.type = 'submit';
           button.className = 'btn btn-info col-3 ml-1'; 
           button.innerHTML = 'Atualizar'; 

           form.appendChild(inputTarefa);
           form.appendChild(button);
           form.appendChild(input_id);
           
           let div_tarefa = document.getElementById('tarefa_' + id_content);
           div_tarefa.innerHTML = '';
           div_tarefa.insertBefore(form, div_tarefa[0]);

         }
      </script>
	</head>

	<body>
		<nav class="navbar navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">
					<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
					App Lista Tarefas
				</a>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-sm-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php">Tarefas pendentes</a></li>
						<li class="list-group-item"><a href="nova_tarefa.php">Nova tarefa</a></li>
						<li class="list-group-item active"><a href="#">Todas tarefas</a></li>
					</ul>
				</div>

				<div class="col-sm-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Todas tarefas</h4>
								<hr />
                        <?php  for ($i=0; $i < count($tarefas); $i++){ 
                           if(!empty($tarefas[$i]->tarefas)){
                              continue;
                           }     
                        ?>
                           <div class="row mb-3 d-flex align-items-center tarefa">

                              <div class="col-sm-9" id="tarefa_<?=$tarefas[$i]->id?>">
                                 <?=$tarefas[$i]->tarefa?> (<?=$tarefas[$i]->status?>)
                              </div>

                              <div class="col-sm-3 mt-2 d-flex justify-content-between">
                                 <i class="fas fa-trash-alt fa-lg text-danger"></i>
                                 <i class="fas fa-edit fa-lg text-info"
                                    onclick="editar(<?= $tarefas[$i]->id?>, '<?=$tarefas[$i]->tarefa?>') ">
                                 </i>
                                 <i class="fas fa-check-square fa-lg text-success"></i>
                              </div>
                           </div>
                           <hr>
                        <?}?> 
						
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>