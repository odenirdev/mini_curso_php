<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini curso PHP</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <?php require_once "controller/pessoa.php"; ?>
</head>

<body>

    <?php if (!empty($_SESSION['mensagem'])): ?>
    <section class="mensagens" style="background-color: <?= $_SESSION['mensagem_cor']; ?>">
        <p>
            <?=$_SESSION['mensagem']?>
        </p>
    </section>
    <?php endif; ?>
    <section class="controle">
        <form>
            <?php if (!empty($id)):?>
            <div>
                <label for="id">ID:</label>
                <input readonly name="id" id="id" type="number" value="<?=$id?>">
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
    <?php
        $pessoas = $pessoa->buscarTodasPessoas();
        if (!empty($pessoas['dados'])):
    ?>
    <section>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($pessoas['dados'] as $p): ?>
                    <tr>
                        <td>
                            <?=$p['id']?>
                        </td>
                        <td>
                            <?=$p['nome']?>
                        </td>
                        <td>
                            <?=$p['sobrenome']?>
                        </td>

                        <td>
                            <form>
                                <button name="visualizar" value="<?=$p['id']?>">Visualizar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </section>
    <?php endif; ?>
</body>

</html>