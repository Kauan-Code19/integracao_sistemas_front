<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_registration.css') ?>">
</head>

<body>
    <div class="container">
        <div class="cadastro">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <h2>Cadastro de Usuário</h2>
            <div class="form-container">
                <form action="<?= base_url('register_user') ?>" method="POST">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>

                    <label for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" required>

                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" required>

                    <label for="nomeCompleto">Nome Completo</label>
                    <input type="text" id="nomeCompleto" name="nomeCompleto" required>

                    <label for="dataNascimento">Data de Nascimento</label>
                    <input type="date" id="dataNascimento" name="dataNascimento" required>

                    <label for="telefone">Telefone</label>
                    <input type="text" id="telefone" name="telefone" required>

                    <label for="logradouro">Logradouro</label>
                    <input type="text" id="logradouro" name="logradouro" required>

                    <label for="numero">Número</label>
                    <input type="text" id="numero" name="numero" required>

                    <label for="bairro">Bairro</label>
                    <input type="text" id="bairro" name="bairro" required>

                    <label for="cep">CEP</label>
                    <input type="text" id="cep" name="cep" required>

                    <label for="cidade">Cidade</label>
                    <input type="text" id="cidade" name="cidade" required>

                    <label for="estado">Estado</label>
                    <select id="estado" name="estado" required>
                        <?php foreach ($estados as $estado): ?>
                            <option value="<?= $estado->value ?>"><?= $estado->value ?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="banco">Banco</label>
                    <input type="text" id="banco" name="banco" required>

                    <label for="conta">Conta</label>
                    <input type="text" id="conta" name="conta" required>

                    <label for="agencia">Agência</label>
                    <input type="text" id="agencia" name="agencia" required>

                    <label for="chavePix">Chave Pix</label>
                    <input type="text" id="chavePix" name="chavePix" required>

                    <label for="perfil">Perfil</label>
                    <select id="perfil" name="perfil" required>
                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                        <option value="COMERCIAL">COMERCIAL</option>
                        <option value="PROJETOS">PROJETOS</option>
                    </select>

                    <button type="submit" class="buttonRegistrar">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="<?= base_url('assets/js/usuario/user_registration.js') ?>"></script>
</body>

</html>