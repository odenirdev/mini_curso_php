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
            <input name="id" id="id" type="hidden" value="<?=$id?>">
            <div>
                <label for="nome">Nome:</label>
                <input name="nome" id="nome" type="text" value="<?=$nome?>">
            </div>
            <div>
                <label for="sobrenome">Sobrenome:</label>
                <input name="sobrenome" id="sobrenome" type="text" value="<?=$sobrenome?>">
            </div>
            <div>
                <?php if (empty($id)): ?>
                    <button name="cadastrar">Cadastrar</button>
                <?php else: ?>
                    <button name="alterar">Alterar</button>
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
                            <th><button name="visualizar" value="<?=$p['id']?>">(X)</button></th>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </section>
</body>

</html>