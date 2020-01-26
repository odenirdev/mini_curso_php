<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini curso PHP</title>

    <style>
        form {
            background-color: red;
            width: 430px;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
        }
        
        form div {
            display: flex;
            width: 100%;
            margin: 1%;
        }
        
        form label {
            font-size: x-large;
            width: 30%;
        }
        
        form input {
            font-size: x-large;
            width: 68%;
        }
        
        form input[type=submit] {
            font-size: large;
            width: 30%;
        }
        
        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>

    <?php
        session_start();

        require_once "model/bancoDeDados.php";
        require_once "model/pessoa.php";

        $pessoa = new pessoa();
        $pessoas = $pessoa->buscarTodasPessoas();
    ?>
</head>

<body>
    <section>
        <form action="controller/pessoa.php" method="POST">
            <div>
                <label for="nome">Nome:</label>
                <input name="nome" id="nome" type="text">
            </div>
            <div>
                <label for="sobrenome">Sobrenome:</label>
                <input name="sobrenome" id="sobrenome" type="text">
            </div>
            <div>
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </section>
    <?php if (!empty($pessoas['dados'])):?>
    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($pessoas['dados'] as $p):?>
                <tr>
                    <th><?= $p['id'] ?></th>
                    <th><?= $p['nome'] ?></th>
                    <th><?= $p['sobrenome'] ?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <?php endif; ?>
</body>

</html>