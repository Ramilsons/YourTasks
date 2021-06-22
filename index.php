<?php
    // conectando com banco de dados
    include('./db/connect.php');

    $sql = "SELECT * FROM `atividades`";
    
    // recendo a resposta do banco de dados
    $values = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>YourTasks</title>
</head>
<body>
    <header>
        <h1>YourTasks</h1>
        <div>
            <h3><?php echo $values->num_rows ?></h3>
            <h5>Tarefas em andamento</h5>
        </div>
        <a title="criar nova tarefa" class="create-task" href="form.php">Adicionar nova tarefa</a>
    </header>
    <article>
        <?php         
            echo "<div class='all'>";
            // percorrendo a resposta da consulta ao banco de dados
       


            while ($value = mysqli_fetch_assoc($values)){
                $id = $value['id'];
                echo "<div class='each'>";
                    echo "<ul>";
                        foreach($value as $key => $each_value){
                            if($key == 'status'){
                                echo "<li class='$key'><input type='checkbox' onclick='save_data($id)' value=$each_value name='status'></li>";
                            }else if($key == 'prazo'){
                                $new_data = explode("-", $each_value);
                                echo "<li class='$key'><div><span>PRAZO</span>".$new_data[2]."/".$new_data[1]. "/".$new_data[0]."</div></li>";
                            }else if($key == 'materia'){
                                echo "<li class='$key'><div><span>MATÉRIA</span>".$each_value."</div></li>";
                            }
                            else{
                                echo "<li class='$key'>".$each_value."</li>";
                            }
                        }
                    echo "</ul>";
                echo "</div>";
            }
            echo "</div>";
        ?>

    </article>
    <form method="POST" action="./db/delete.php">
        <input type="hidden" name="ids" id="id_remove">
        <div class="insideForm">
            <button type="submit" class="btn-delete">Marcar como concluída</button>
            <h4>Você selecionou tarefas, deseja marcar como concluídas?</h4>
        </div>
    </form>

    <script>
        let checks = document.querySelectorAll('input[type="checkbox"]')
        let btnDelete = document.querySelector('.btn-delete')
        let to_remove = []

        checks.forEach(cada_check => { 
            cada_check.addEventListener('click', function(e){ 
                if(e.target.checked == true || document.querySelectorAll('input[type="checkbox"]:checked').length > 0){
                    btnDelete.classList.add('active');
                    document.querySelector('.insideForm').classList.add('active');
                }else{
                    btnDelete.classList.remove('active');
                    document.querySelector('.insideForm').classList.remove('active');
                }
            })
        })

        function save_data(id){
            if(to_remove.indexOf(id) == -1){
                to_remove.push(id);
            }else{
                to_remove = to_remove.splice(id, 1);
            }
            document.getElementById('id_remove').value = to_remove;
        }
    </script>

</body>
</html>
