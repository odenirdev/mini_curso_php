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
require_once "controller/pessoa.php";
?>
</head>

<body>
    <section>
        <p><?=$_SESSION['mensagem']?></p>
    </section>
    <section>
        <form>
            <?php if (!empty($id)):?>
            <div>
                <label for="id">ID:</label>
                <input name="id" id="id" type="number" value="<?=$id?>">
            </div>
            <?php endif; ?>
            <div>
                <label for="nome">Nome:</label>
                <input require name="nome" id="nome" type="text" value="<?php if (!empty($nome)) { echo $nome; } ?>">
            </div>
            <div>
                <label for="sobrenome">Sobrenome:</label>
                <input name="sobrenome" id="sobrenome" type="text" value="<?php if (!empty($sobrenome)) { echo $sobrenome; } ?>">
            </div>
            <div>
                <?php 
                if (empty($id)): ?>
                    <button name="cadastrar">Cadastrar</button>
                <?php else: ?>
                    <button name="alterar">Alterar</button>
                    <button name="deletar">Deletar</button>
                    <button name="limpar">Limpar</button>
                <?php endif; ?>
            </div>
        </form>
    </section>
    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Visualizar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pessoas = $pessoa->buscarTodasPessoas();
                    foreach ($pessoas['dados'] as $p): ?>
                    <tr>
                        <th>
                            <?=$p['id']?>
                        </th>
                        <th>
                            <?=$p['nome']?>
                        </th>
                        <th>
                            <?=$p['sobrenome']?>
                        </th>

                        <th>
                            <form>
                                <button name="visualizar" value="<?=$p['id']?>">(X)</button>
                            </form>
                        </th>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </section>
</body>

</html>