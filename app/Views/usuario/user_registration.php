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
                    <h3>Informações Pessoais</h3>
                    <div class="grid-container info-pessoais">
                        <div class="form-group">
                            <label for="nomeCompleto">Nome Completo</label>
                            <input type="text" id="nomeCompleto" name="nomeCompleto">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf">
                        </div>
                        <div class="form-group">
                            <label for="dataNascimento">Data de Nascimento</label>
                            <input type="date" id="dataNascimento" name="dataNascimento">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone">
                        </div>
                        <div class=" form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email">
                        </div>
                        <div class=" form-group">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha">
                        </div>
                    </div>

                    <h3>Endereço</h3>
                    <div class="grid-container endereco">
                        <div class="form-group">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" id="logradouro" name="logradouro">
                        </div>
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" id="numero" name="numero">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro">
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" val>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade">
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" id="estado" name="estado">
                        </div>
                    </div>

                    <h3>Dados Bancários</h3>
                    <div class="grid-container dados-bancarios">
                        <div class="form-group">
                            <label for="banco">Banco</label>
                            <input type="text" id="banco" name="banco">
                        </div>
                        <div class="form-group">
                            <label for="conta">Conta</label>
                            <input type="text" id="conta" name="conta">
                        </div>
                        <div class="form-group">
                            <label for="agencia">Agência</label>
                            <input type="text" id="agencia" name="agencia">
                        </div>
                        <div class="form-group">
                            <label for="chavePix">Chave Pix</label>
                            <input type="text" id="chavePix" name="chavePix">
                        </div>
                    </div>

                    <h3>Acesso</h3>
                    <div class="grid-container acesso">
                        <div class="form-group">
                            <label for="perfil">Perfil</label>
                            <select id="perfil" name="perfil">
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="COMERCIAL">COMERCIAL</option>
                                <option value="PROJETOS">PROJETOS</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn-Registrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="<?= base_url('assets/js/usuario/user_registration.js') ?>"></script>
</body>

</html>