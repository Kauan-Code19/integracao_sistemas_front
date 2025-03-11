<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($titulo ?? 'Traduzzo') ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/reset.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/sidebar.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

    <?php if (session()->has('jwt_token') && uri_string() !== 'login'): ?>
        <?= view('includes/sidebar'); ?>
    <?php endif; ?>

    <div class="content">
        <?= $conteudo ?>
    </div>

    <script src="<?= base_url('assets/js/sidebar.js') ?>"></script>
</body>

</html>