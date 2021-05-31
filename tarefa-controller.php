<?php
require '../../private_archive/app_lista_tarefas/tarefa_model.php';
require '../../private_archive/app_lista_tarefas/tarefa_service.php';
require '../../private_archive/app_lista_tarefas/conexao.php';
$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao ; 

if ($acao == 'inserir'){
   $tarefa = new  Tarefa();
   $tarefa->__set('tarefa', $_POST['tarefa']);
   $conexao = new Conexao();
   $tarefaService =  new TarefaService($conexao, $tarefa);
   $tarefaService->inserir();

   if(!$_POST['tarefa'] === '' || !empty($_POST['tarefa'])){
      header('location: nova_tarefa.php?envio=sucesso');
   }else{
      header('location: nova_tarefa.php?envio=error');
      
   }

}else if($acao == 'recuperar'){
   $tarefa = new Tarefa();
   $conexao = new conexao();
   $tarefaService = new TarefaService($conexao, $tarefa);
   $tarefas = $tarefaService->recuperar();
   
}else if ($acao == 'finalizados'){
   $tarefa = new Tarefa();
   $conexao = new conexao();
   $tarefaService = new TarefaService($conexao, $tarefa);
   $tarefas = $tarefaService->finalizadas();

}else if ($acao == 'atualizar'){
   $tarefa_3 = new Tarefa();
   $tarefa_3->__set('id', $_POST['id']);
   $tarefa_3->__set('tarefa', $_POST['tarefa']);
   $conexao = new Conexao();
   $tarefaService = new TarefaService($conexao, $tarefa_3);
   $tarefaService->atualizar();

}else if ($acao ==  'remover'){
   $id_remover = new Tarefa();
   $conexao = new Conexao();

   $id_remover->__set('id', $_GET['id']);
   $tarefaService = new TarefaService($conexao, $id_remover);
   $tarefaService->remover();

}else if ($acao == 'confirmaTarefa'){
   $id_confirma = new Tarefa();
   $conexao = new Conexao();

   $id_confirma->__set('id', $_GET['id']);
   $tarefaService = new TarefaService($conexao, $id_confirma);
   $tarefaService->confirma();
}



?>