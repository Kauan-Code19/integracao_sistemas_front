<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_edit.css') ?>">
</head>

<body>
    <div class="container">
        <div class="edicao">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <h2>Edição de Usuário</h2>
            <div class="form-container">
                <form action="<?= base_url('edit_user') ?>" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="<?= esc($usuario['id']) ?>">

                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="<?= esc($usuario['email']) ?>" required>

                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha">

                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="<?= esc($usuario['cpf']) ?>" required>

                    <label for="nomeCompleto">Nome Completo</label>
                    <input type="text" id="nomeCompleto" name="nomeCompleto" value="<?= esc($usuario['nomeCompleto']) ?>" required>

                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" value="<?= esc($usuario['telefone']) ?>" required>

                    <label for="dataNascimento">Data de Nascimento</label>
                    <input type="date" id="dataNascimento" name="dataNascimento" value="<?= esc($usuario['dataNascimento']) ?>" required>

                    <label for="logradouro">Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro" value="<?= esc($usuario['endereco']['logradouro']) ?>" required>

                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero" value="<?= esc($usuario['endereco']['numero']) ?>" required>

                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" value="<?= esc($usuario['endereco']['bairro']) ?>" required>

                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" value="<?= esc($usuario['endereco']['cidade']) ?>" required>

                    <label for="estado">Estado</label>
                    <input type="text" id="estado" name="estado" value="<?= esc($usuario['endereco']['estado']) ?>" required>

                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" value="<?= esc($usuario['endereco']['cep']) ?>" required>

                    <label for="banco">Banco</label>
                    <input type="text" id="banco" name="banco" value="<?= esc($usuario['dadosBancarios']['banco']) ?>" required>

                    <label for="conta">Conta</label>
                    <input type="text" id="conta" name="conta" value="<?= esc($usuario['dadosBancarios']['conta']) ?>" required>

                    <label for="agencia">Agência</label>
                    <input type="text" id="agencia" name="agencia" value="<?= esc($usuario['dadosBancarios']['agencia']) ?>" required>

                    <label for="chavePix">Chave Pix</label>
                    <input type="text" id="chavePix" name="chavePix" value="<?= esc($usuario['dadosBancarios']['chavePix']) ?>" required>

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
    </div>
</body>

</html>