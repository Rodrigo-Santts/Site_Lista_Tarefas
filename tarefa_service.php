<?php
         //// CRUD ////

class TarefaService {

   private $conexao;
   private $tarefa;

   public function __construct( $conexao,  $tarefa){
      $this->conexao  = $conexao->conectar();      
      $this->tarefa = $tarefa;      
   }

   public  function inserir(){
      $query = 'insert into tb_tarefas(tarefa) values(:tarefa)';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa')); 
      $stmt->execute();
   }
   public  function recuperar (){
      $query = 
      'select 
         t.id, s.status, tarefa
      from 
         tb_tarefas as t
         left join tb_status as s on (t.id_status = s.id) where id_status = 1';
      $stmt =  $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
       
   }
   public  function finalizadas (){
      $query = 
      'select 
         t.id, s.status, tarefa
      from 
         tb_tarefas as t
         left join tb_status as s on (t.id_status = s.id) where id_status = 2';
      $stmt =  $this->conexao->prepare($query);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
       
   }
   public  function atualizar (){
      $query = 'update tb_tarefas set tarefa = :tarefa where id = :id';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa')); 
      $stmt->bindValue(':id', $this->tarefa->__get('id')); 
      $stmt->execute();
      header('Location: todas_tarefas.php');     
   }

   public  function remover (){
      $query = 'delete from tb_tarefas where id = ?';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(1, $this->tarefa->__get('id')); 
      $stmt->execute();
      header('Location: todas_tarefas.php'); 
   }

   public  function confirma (){
      $query = 'update tb_tarefas set id_status = 2  where id = ?';
      $stmt = $this->conexao->prepare($query);
      $stmt->bindValue(1, $this->tarefa->__get('id')); 
      $stmt->execute();
      header('Location: todas_tarefas.php'); 
   }

  
}
?>