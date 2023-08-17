<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset('css/bootstrap.min.css') ?>">
    <title>Blog Personnel</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Chat App</a>
            <form class="d-flex" action="<?= route('auth.logout') ?>" method="post">
                <input class="btn btn-outline-success" type="submit" value="Log out">
            </form>
            </div>
        </div>
    </nav>
    <?= _yield('content'); ?>
    <script src="<?= asset('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>