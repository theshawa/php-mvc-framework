<?php

use app\core\model\DbModel;

/**
 * @var ?DbModel $model ;
 *
 */
require_once __DIR__ . "/includes/auth_start.php" ?>
<form action="/login" method="post" class="card-body">
    <h2 class="card-title">Login</h2>
    <p class="card-text text-muted">Welcome again!</p>
    <div class="row mt-2">
        <?php echo buildField($model, "email", "Email address", "name@example.com", "email") ?>
        <?php echo buildField($model, "password", "Password", "**********", "password") ?>
    </div>
    <button class="btn btn-primary">Login</button>
    <p class="mt-2">Don't have an account: <a href="/register">Register</a></p>
</form>