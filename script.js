function editar(id_content, content){
   let form = document.createElement('form');
    form.action = 'tarefa_controller.php?acao=atualizar';
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
 function remover(id){
    location.href = 'tarefa_controller.php?acao=remover&id='+ id;
 }

 function confirma_tarefa(id){
   location.href = 'tarefa_controller.php?acao=confirmaTarefa&id='+ id;
 }