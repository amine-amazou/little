<?php
    _extends('layouts.guest');
    _section('content');
?>


<form method="POST" action="<?= route('auth.login') ?>">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
        <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username">
        <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© Little, 2023</p>
</form>

<a href="<?= route('registre') ?>"> I don't have account, Registre now </a>