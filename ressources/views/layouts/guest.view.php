<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
    <title>Blog Personnel</title>
</head>
<body>
<main class="form-signin w-100 m-auto">
    <?= _yield('content'); ?>
</main>
<script src="<?= asset('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>