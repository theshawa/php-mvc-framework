<?php
/**
 * @var string $pageTitle
 */

use src\Application;

$pageTitle = $pageTitle ?? "";
$user = Application::$app->user;
$currentPath = Application::$app->request->getPath();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php echo $pageTitle; ?>MVC Framework Demo</title>
</head>
<body>
<header class="navbar sticky-top navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">MVC Framework Demo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <?php if ($user): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $user->getDisplayName(); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end"
                            aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </li>

                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link<?php echo $currentPath == "login" ? ' active' : '' ?>" aria-current="page"
                           href="/login">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
<main class="container-fluid">
    <?php if ($message = Application::$app->session->getFlashMessage('success')): ?>
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            <?php echo $message['content'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if ($message = Application::$app->session->getFlashMessage('error')): ?>
        <div class="alert alert-error alert-dismissible mb-4" role="alert">
            <?php echo $message['content'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    {{content}}
</main>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-5 border-top container-fluid">
    <a class=""
       href="https://github.com/theshawa/php-mvc-framework.git"
       target="_blank">View Project on
        Github</a>
    <div class="nav col-md-4 justify-content-end">
        <p class="mb-0">Developed by <a href="https://theshawa-dev.web.app" title="Visit Theshawa Dasun"
                                        target="_blank">Theshawa
                Dasun</a> @ 2024</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>