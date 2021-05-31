<?php
class Tarefa {
   private $id;
   private $id_status;
   private $tarefas;
   private $data_cadastro;

   public function __get($value){return $this->$value;}
   public function __set($attr, $value){$this->$attr = $value;}
}