<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traduzzo</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/welcome_message.css') ?>">
</head>

<body>
    <div class="container">
        <h2>Lista de Usuários</h2>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Perfil</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>usuario@example.com</td>
                    <td>ADMINISTRADOR</td>
                </tr>
                <tr>
                    <td>usuario22@email.com</td>
                    <td>COMERCIAL</td>
                </tr>
                <tr>
                    <td>projetos33@email.com</td>
                    <td>PROJETOS</td>
                </tr>
            </tbody>
        </table>
        <a href="<?= base_url('user_registration') ?>" class="btn">Cadastrar Novo Usuário</a>
    </div>
</body>

</html>