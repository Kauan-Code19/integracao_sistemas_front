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
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Nome Completo</th>
                            <th>Data de Nascimento</th>
                            <th>Telefone</th>
                            <th>Logradouro</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                            <th>Estado</th>
                            <th>Banco</th>
                            <th>Agencia</th>
                            <th>Conta</th>
                            <th>Chave Pix</th>
                            <th>Perfil</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)) : ?>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <tr>
                                    <td><?= esc($usuario['email']) ?></td>
                                    <td><?= esc($usuario['cpf']) ?></td>
                                    <td><?= esc($usuario['nomeCompleto']) ?></td>
                                    <td><?= esc(date('d/m/Y', strtotime($usuario['dataNascimento']))) ?></td>
                                    <td><?= esc($usuario['telefone']) ?></td>
                                    <td><?= esc($usuario['endereco']['logradouro']) ?></td>
                                    <td><?= esc($usuario['endereco']['numero']) ?></td>
                                    <td><?= esc($usuario['endereco']['bairro']) ?></td>
                                    <td><?= esc($usuario['endereco']['cep']) ?></td>
                                    <td><?= esc($usuario['endereco']['cidade']) ?></td>
                                    <td><?= esc($usuario['endereco']['estado']) ?></td>
                                    <td><?= esc($usuario['dadosBancarios']['banco']) ?></td>
                                    <td><?= esc($usuario['dadosBancarios']['agencia']) ?></td>
                                    <td><?= esc($usuario['dadosBancarios']['conta']) ?></td>
                                    <td><?= esc($usuario['dadosBancarios']['chavePix']) ?></td>
                                    <td><?= esc($usuario['perfil']) ?></td>
                                    <td>
                                        <a href="<?= base_url('user_edit/' . $usuario['id']) ?>" class="btn-editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?= base_url('delete_user/' . $usuario['id']) ?>" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn-deletar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
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
            <a href="<?= base_url('user_registration') ?>" class="buttonCadastrar">Cadastrar Novo Usuário</a>
        </div>
    </div>
</body>

</html>