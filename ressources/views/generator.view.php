<h2> Generator </h2>

<h4>Models:</h4>
<form action="<?= route('generator.model') ?>" method="GET">
    Generate new Model: <input type="text" name="model_name" id="" placeholder="Model name" required> <br>
    <input type="submit" value="Generate">
</form>

<h4>Controllers:</h4>
<form action="<?= route('generator.controller') ?>" method="GET">
    Generate new Controller: <input type="text" name="controller_name" id="" placeholder="Controller name" required> <br>
    <input type="submit" value="Generate">
</form>

<h4>Views:</h4>
<form action="<?= route('generator.view') ?>" method="GET">
    Generate new View: <input type="text" name="view_name" id="" placeholder="View name" required> <br>
    Folder name: <input type="text" name="folder_path" id="" placeholder="Ex: views/auth"> <br>
    Note: default folder /views <br>
    <input type="submit" value="Generate">
</form>

<h4>Middlewares:</h4>
<form action="<?= route('generator.middleware') ?>" method="GET">
    Generate new Middleware: <input type="text" name="middleware_name" id="" placeholder="Middleware name" required> <br>
    <input type="submit" value="Generate">
</form>

<h4>Migrations:</h4>
<form action="<?= route('generator.migration') ?>" method="GET">
    Generate new Migration: <input type="text" name="migration_name" id="" placeholder="Migration name" required> <br>
    <input type="submit" value="Generate">
</form>

<hr>
<p> <?= $h ?> </p>

<style>
    input {
        margin-bottom: 3px;
    }
</style>
