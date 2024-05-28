<?php

use app\core\model\DbModel;

/**
 * @var ?DbModel $model ;
 *
 */
require_once __DIR__ . "/includes/auth_start.php" ?>
<form action="/register" method="post" class="card-body">
    <h2 class="card-title">Register</h2>
    <p class="card-text text-muted">Welcome! This is a demo.</p>
    <div class="row mt-2">
        <?php echo buildField($model, "firstName", "First name", "John") ?>
        <?php echo buildField($model, "lastName", "Last name", "Doe") ?>
        <?php echo buildField($model, "email", "Email address", "name@example.com", "email") ?>
        <?php echo buildField($model, "password", "Password", "**********", "password") ?>
        <?php echo buildField($model, "confirmPassword", "Confirm Password", "**********", "password") ?>
    </div>
    <button class="btn btn-primary">Register</button>
    <p class="mt-2">Already have an account: <a href="/login">Login</a></p>
</form>