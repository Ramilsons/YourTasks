<?php

include('./connect.php');


$ids_to_remove = $_POST['ids'];

echo($ids_to_remove);

$all_ids_to_remove = explode(',', $ids_to_remove);

foreach($all_ids_to_remove as $id){
    $sql = "DELETE FROM `atividades` WHERE id = $id";

    if(mysqli_query($conn, $sql)){
        echo 'Removido com sucesso';
        header("Location: http://localhost/crud/index.php");
    }else{
        echo 'Houve falha na remoção';
    }
}


?>