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

                    <h3>Informações Pessoais</h3>
                    <div class="grid-container info-pessoais">
                        <div class="form-group">
                            <label for="nomeCompleto">Nome Completo</label>
                            <input type="text" id="nomeCompleto" name="nomeCompleto" value="<?= old('nomeCompleto', esc($usuario['nomeCompleto'])) ?>">
                            <small>Digite seu nome completo conforme consta no documento.</small>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" value="<?= old('cpf', esc($usuario['cpf'])) ?>">
                            <small>Informe um CPF válido no formato: 000.000.000-00.</small>
                        </div>
                        <div class="form-group">
                            <label for="dataNascimento">Data de Nascimento</label>
                            <input type="date" id="dataNascimento" name="dataNascimento" value="<?= old('dataNascimento', esc($usuario['dataNascimento'])) ?>">
                            <small>Informe sua data de nascimento no formato: DD/MM/AAAA.</small>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" value="<?= old('telefone', esc($usuario['telefone'])) ?>">
                            <small>Digite seu telefone com DDD. Ex: (XX) 9XXXX-XXXX.</small>
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="<?= old('', esc($usuario['email'])) ?>">
                            <small>Informe um e-mail válido. Ex: nome@email.com</small>
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" id="senha" name="senha" value="<?= old('senha') ?>">
                            <small>A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, uma letra minúscula, um número e um caractere especial (@#$%^&+=!).</small>
                        </div>
                    </div>

                    <h3>Endereço</h3>
                    <small class="aviso-endereco">⚠ Todos os campos de endereço devem estar preenchidos ou todos vazios.</small>
                    <div class="grid-container endereco">
                        <div class="form-group">
                            <label for="logradouro">Logradouro</label>
                            <input type="text" id="logradouro" name="logradouro" value="<?= old('logradouro', isset($usuario['endereco']['logradouro']) ? esc($usuario['endereco']['logradouro']) : '') ?>">
                            <small class="aviso-logradouro">Exemplo: Rua das Flores, Avenida Brasil...</small>
                        </div>
                        <div class="form-group">
                            <label for="numero">Número</label>
                            <input type="text" id="numero" name="numero" value="<?= old('numero', isset($usuario['endereco']['numero']) ? esc($usuario['endereco']['numero']) : '') ?>">
                            <small>O número deve ser apenas numérico ou alfanumérico.</small>
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" value="<?= old('bairro', isset($usuario['endereco']['bairro']) ? esc($usuario['endereco']['bairro']) : '') ?>">
                            <small class="aviso-bairro">Exemplo: Centro, Jardim das Palmeiras...</small>
                        </div>
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" id="cep" name="cep" value="<?= old('cep', isset($usuario['endereco']['cep']) ? esc($usuario['endereco']['cep']) : '') ?>">
                            <small>Informe um CEP válido no formato: 00000-000.</small>
                        </div>
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" value="<?= old('cidade', isset($usuario['endereco']['cidade']) ? esc($usuario['endereco']['cidade']) : '') ?>">
                            <small>"O nome da cidade deve ter entre 6 e 30 caracteres.</small>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select id="estado" name="estado">
                                <option value="">Selecione um estado</option>
                                <?php foreach ($estados as $estado): ?>
                                    <option value="<?= esc($estado->value) ?>"
                                        <?= old('estado', (isset($usuario['endereco']['estado']) && $usuario['endereco']['estado'] == $estado->value ? 'selected' : '')) ?>>
                                        <?= esc($estado->value) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small>Escolha o estado correspondente.</small>
                        </div>
                    </div>

                    <h3>Dados Bancários</h3>
                    <small class="aviso-bancario">⚠ Os campos Banco, Conta e Agência devem estar todos preenchidos ou todos vazios. A Chave Pix é opcional.</small>
                    <div class="grid-container dados-bancarios">
                        <div class="form-group">
                            <label for="banco">Banco</label>
                            <input type="text" id="banco" name="banco" value="<?= old('banco', isset($usuario['dadosBancarios']['banco']) ? esc($usuario['dadosBancarios']['banco']) : '') ?>">
                            <small>Exemplo: Banco do Brasil, Bradesco...</small>
                        </div>
                        <div class="form-group">
                            <label for="conta">Conta</label>
                            <input type="text" id="conta" name="conta" value="<?= old('conta', isset($usuario['dadosBancarios']['conta']) ? esc($usuario['dadosBancarios']['conta']) : '') ?>">
                            <small>A conta deve ter entre 1 e 12 caracteres podendo conter um dígito de 0 a 2 caracteres separado por hífen.</small>
                        </div>
                        <div class="form-group">
                            <label for="agencia">Agência</label>
                            <input type="text" id="agencia" name="agencia" value="<?= old('agencia', isset($usuario['dadosBancarios']['agencia']) ? esc($usuario['dadosBancarios']['agencia']) : '') ?>">
                            <small>A agência deve ter entre 1 e 5 caracteres podendo conter um dígito de 0 a 2 caracteres separado por hífen.</small>
                        </div>
                        <div class="form-group">
                            <label for="chavePix">Chave Pix</label>
                            <input type="text" id="chavePix" name="chavePix" value="<?= old('chavePix', isset($usuario['dadosBancarios']['chavePix']) ? esc($usuario['dadosBancarios']['chavePix']) : '') ?>">
                            <small>Informe CPF, e-mail, telefone ou chave aleatória.</small>
                        </div>
                    </div>

                    <h3>Acesso</h3>
                    <div class="grid-container acesso">
                        <div class="form-group">
                            <label for="perfil">Perfil</label>
                            <select id="perfil" name="perfil">
                                <option value="ADMINISTRADOR" <?= old('perfil', $usuario['perfil'] === 'ADMINISTRADOR' ? 'selected' : '') ?>>ADMINISTRADOR</option>
                                <option value="COMERCIAL" <?= old('perfil', $usuario['perfil'] === 'COMERCIAL' ? 'selected' : '') ?>>COMERCIAL</option>
                                <option value="PROJETOS" <?= old('perfil', $usuario['perfil'] === 'PROJETOS' ? 'selected' : '') ?>>PROJETOS</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btnEditar">Salvar Alterações</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>