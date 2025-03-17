<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_list.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="listagem">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <h2>Usuários</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th class="email">Email</th>
                            <th class="nome-completo">Nome Completo</th>
                            <th>Perfil</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)) : ?>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td class="email"><?= esc($usuario['email']) ?></td>
                                    <td class="nome-completo"><?= esc($usuario['nomeCompleto']) ?></td>
                                    <td class="perfil"><?= esc($usuario['perfil']) ?></td>
                                    <td class="acoes">
                                        <a href="<?= base_url('user_edit/' . $usuario['id']) ?>" class="btn-editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="<?= base_url('user_details/' . $usuario['id']) ?>" class="btn-detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="7">Nenhum usuário encontrado.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <a href="<?= base_url('user_registration') ?>" class="btn-cadastrar">Cadastrar Novo Usuário</a>
        </div>
    </div>
</body>

</html>