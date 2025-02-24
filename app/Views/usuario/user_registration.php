<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traduzzo</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_registration.css') ?>">
</head>

<body>
    <div class="container">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="error-message">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <h2>Cadastro De Usuários</h2>
        <form action="<?= base_url('register_user') ?>" method="POST">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>

            <label for="perfil">Perfil</label>
            <select id="perfil" name="perfil" required>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                <option value="COMERCIAL">COMERCIAL</option>
                <option value="PROJETOS">PROJETOS</option>
            </select>

            <button type="submit" class="buttonRegistrar">Registrar</button>
        </form>
    </div>
</body>

</html>