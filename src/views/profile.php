<?php

use app\core\model\DbModel;
use src\Application;

$user = Application::$app->user;
if (!$user) {
    echo "No profile found!";
    exit();
}

function buildField(DbModel $user, string $field, string $label)
{
    return "<p>$label: <b>{$user->$field}</b></p>";
}

?>

<h1>Profile</h1>

<div class="card">
    <div class="card-body">
        <?php echo buildField($user, "firstName", "First Name"); ?>
        <?php echo buildField($user, "lastName", "Last Name"); ?>
        <?php echo buildField($user, "email", "Email Address"); ?>
    </div>
</div>

