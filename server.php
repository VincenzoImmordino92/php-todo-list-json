<?php
// andiamo a leggere il file JSON e lo salviamo sotto forma di stringa
//utilizziamo il nostro file_get_contents() che accede al file json ed gli elementi li restituisce in forma di stringa
$json_string = file_get_contents('./partials/todo-list.json');

//trasformiamo la mia stringa in un array php
$listTask = json_decode($json_string, true);

// vari controlli 

//trasformiamo la nostra listTask da file array php ad file jason array
header('Content-Type: application/json');

//ristampo la lista ricodificata da array ad stringa json
echo json_encode($listTask);

?>