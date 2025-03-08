<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traduzzo</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_list.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="listagem">
            <h2>Lista de Usuários</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)) : ?>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td><?= esc($usuario['email']) ?></td>
                                    <td><?= esc($usuario['perfil']) ?></td>
                                    <td>
                                        <a href="<?= base_url('editar_usuario/' . $usuario['id']) ?>" class="btn-editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('deletar_usuario/' . $usuario['id']) ?>" class="btn-deletar" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3">Nenhum usuário encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?= base_url('user_registration') ?>" class="buttonCadastrar">Cadastrar Novo Usuário</a>
        </div>
    </div>
</body>


</html>