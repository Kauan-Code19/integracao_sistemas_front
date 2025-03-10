<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traduzzo</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_edit.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="error-message">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <div class="edicao">
            <h2>Edição De Usuários</h2>
            <form action="<?= base_url('edit_user') ?>" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="id" value="<?= esc($usuario['id']) ?>">

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" value="<?= esc($usuario['email']) ?>" required>

                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha">

                <label for="perfil">Perfil</label>
                <select id="perfil" name="perfil" required>
                    <option value="ADMINISTRADOR" <?= $usuario['perfil'] === 'ADMINISTRADOR' ? 'selected' : '' ?>>ADMINISTRADOR</option>
                    <option value="COMERCIAL" <?= $usuario['perfil'] === 'COMERCIAL' ? 'selected' : '' ?>>COMERCIAL</option>
                    <option value="PROJETOS" <?= $usuario['perfil'] === 'PROJETOS' ? 'selected' : '' ?>>PROJETOS</option>
                </select>

                <button type="submit" class="buttonEditar">Editar</button>
            </form>
        </div>
    </div>
</body>

</html>