<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro | Devsbook</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/login.css" />
    <link rel="shortcut icon" href="<?= $base ?>/assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <header>
        <div class="container">
            <a href=""><img src="<?= $base ?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?= $base ?>/cadastro">
            <?php if (!empty($flash)) : ?>
                <div class="flash"><?= $flash ?></div>
            <?php endif; ?>

            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu E-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua Senha" class="input" type="password" name="password" />

            <input placeholder="Digite sua Data de Nascimento" 
            class="input" type="text" name="birthdate" id="birthdate" />

            <input class="button" type="submit" value="Fazer cadastro" />

            <a href="<?= $base ?>/login">Já tem conta? Faça o login</a>
        </form>
    </section>
    <script src="<?= $base ?>/assets/js/imask.js"></script>
    <script>
        IMask(
            document.getElementById('birthdate'),
            {
                mask:'00/00/0000'
            }

        );
    </script>
</body>
</html>