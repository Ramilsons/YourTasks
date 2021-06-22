<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/add.css">
    <title>Adicionar nova tarefa</title>
</head>
<body>
    <header>
        <a href="index.php">Voltar à home</a>
    </header>
    <article>
        <form action="db/insert.php" method="post">
            <label>
                Descrição
                <input type="text" name="description" required>
            </label>
            <label>
                Matéria
                <input type="text" name="topic" required>
            </label>
            <label>
                Prazo
                <input type="date" name="deadline" required>
            </label>
            
            <button type="submit">Criar</button>
        </form>
    </article>
</body>
</html>