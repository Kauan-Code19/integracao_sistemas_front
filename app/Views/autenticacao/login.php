<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traduzzo</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/autenticacao/login.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="login">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>

            <h2>Login</h2>
            <form action="<?= base_url('login') ?>" method="POST">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit" class="buttonEntrar">Entrar</button>
            </form>
        </div>

        <div class="imagem">
            <img src="<?= base_url('assets/traduzzo_cover.jpeg'); ?>" alt="Logo">
        </div>
    </div>
</body>

</html>