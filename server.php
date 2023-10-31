<?php
// andiamo a leggere il file JSON e lo salviamo sotto forma di stringa
//utilizziamo il nostro file_get_contents() che accede al file json ed gli elementi li restituisce in forma di stringa
$json_string = file_get_contents('./partials/todo-list.json');

//trasformiamo la mia stringa in un array php
$listTask = json_decode($json_string, true);




// vari controlli 
//controllo se i miei task sono arrivati e l'inserisco nel nostro array
if(isset($_POST['newTaskItem']) && isset($_POST['done'])){

  $listTask[] = [
    "task" => $_POST['newTaskItem'],
    "barred" => filter_var($_POST['done'],FILTER_VALIDATE_BOOLEAN)
  ];
}

//controllo se la mia 
if(isset($_POST['removeTask'])){
  $indexRemoveTask = $_POST['removeTask'];
  if($indexRemoveTask){
    array_splice($listTask,$indexRemoveTask,1);
  } 
  
} 


file_put_contents('./partials/todo-list.json',json_encode($listTask));

//trasformiamo la nostra listTask da file array php ad file jason array
header('Content-Type: application/json');
//ristampo la lista ricodificata da array ad stringa json
echo json_encode($listTask);

?>