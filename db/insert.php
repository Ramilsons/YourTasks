<?php
    include('./connect.php');

    $description = $_POST['description'];
    $topic = $_POST['topic'];
    $deadline = $_POST['deadline'];
    $status = 0;

    $sql = "INSERT INTO `atividades`( `descricao`, `materia`, `prazo`, `status`) VALUES (
        '$description',
        '$topic',
        '$deadline',
        $status
    )";

    if(mysqli_query($conn, $sql)){
        echo 'Cadastro Realizado com sucesso';
        header("Location: http://localhost/crud/index.php");
        die();
    }else{
        echo 'Houve falha no cadastramento';
    }

?>