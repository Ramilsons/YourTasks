<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $data_base = 'tarefas';

    $conn = mysqli_connect($server, $user, $password, $data_base);

    // checando se houve erro
    if (!$conn) {
        die("Conexão falhou");
    }
?>