<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/usuario/user_details.css') ?>">
</head>

<body>
    <div class="container">
        <div class="edicao">
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <h2>Detalhes de Usuário</h2>
            <div class="details-container">
                <h3>Informações Pessoais</h3>
                <div class="grid-container info-pessoais">
                    <div class="form-group group-pessoais">
                        <label for="nomeCompleto">Nome Completo</label>
                        <input type="text" id="nomeCompleto" value="<?= esc($usuario['nomeCompleto']) ?>" disabled>
                    </div>
                    <div class="form-group group-pessoais">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" value="<?= esc($usuario['cpf']) ?>" disabled>
                    </div>
                    <div class="form-group group-pessoais">
                        <label for="dataNascimento">Data de Nascimento</label>
                        <input type="date" id="dataNascimento" value="<?= esc($usuario['dataNascimento']) ?>" disabled>
                    </div>
                    <div class="form-group group-pessoais">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" value="<?= esc($usuario['email']) ?>" disabled>
                    </div>
                    <div class="form-group group-pessoais">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" value="<?= esc($usuario['telefone']) ?>" disabled>
                    </div>
                </div>

                <h3>Endereço</h3>
                <div class="grid-container endereco">
                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" id="logradouro" value="<?= esc($usuario['endereco']['logradouro']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" id="numero" value="<?= esc($usuario['endereco']['numero']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" id="bairro" value="<?= esc($usuario['endereco']['bairro']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" value="<?= esc($usuario['endereco']['cep']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" id="cidade" value="<?= esc($usuario['endereco']['cidade']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" value="<?= esc($usuario['endereco']['estado']) ?>" disabled>
                    </div>
                </div>

                <h3>Dados Bancários</h3>
                <div class="grid-container dados-bancarios">
                    <div class="form-group">
                        <label for="banco">Banco</label>
                        <input type="text" id="banco" value="<?= esc($usuario['dadosBancarios']['banco']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="conta">Conta</label>
                        <input type="text" id="conta" value="<?= esc($usuario['dadosBancarios']['conta']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="agencia">Agência</label>
                        <input type="text" id="agencia" value="<?= esc($usuario['dadosBancarios']['agencia']) ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label for="chavePix">Chave Pix</label>
                        <input type="text" id="chavePix" value="<?= esc($usuario['dadosBancarios']['chavePix']) ?>" disabled>
                    </div>
                </div>

                <h3>Acesso</h3>
                <div class="grid-container acesso">
                    <div class="form-group">
                        <label for="perfil">Perfil</label>
                        <input type="text" id="perfil" value="<?= esc($usuario['perfil']) ?>" disabled>
                    </div>
                </div>

                <div class="grid-container acoes">
                    <div class="form-group">
                        <a href="<?= base_url('user_edit/' . esc($usuario['id'])) ?>" class="buttonEditar">Editar Usuário</a>
                    </div>
                    <div class="form-group">
                        <form action="<?= base_url('delete_user/' . esc($usuario['id'])) ?>" method="POST" class="form-deletar">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="button" class="btn-deletar" onclick="mostrarModal()">
                                Deletar
                            </button>
                        </form>
                    </div>

                    <div id="modalConfirmacao" class="modal">
                        <div class="modal-content">
                            <h2>Confirmação</h2>
                            <p>Tem certeza que deseja excluir este usuário?</p>
                            <div class="modal-buttons">
                                <button onclick="fecharModal()">Cancelar</button>
                                <button id="confirmarExclusao">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/usuario/user_details.js') ?>"></script>
</body>

</html>