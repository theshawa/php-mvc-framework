<?php
/**
 * @var string $pageTitle
 */

$pageTitle = $pageTitle ?? "";
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

<main class="container-lg py-5">
    <a class="navbar-brand " href="/">MVC Framework Demo</a>
    <div class="card mt-2" style="width: 36rem;max-width: 100%">
        {{content}}
    </div>
</main>
<footer class="container-lg pb-4">
    <p class="mb-0">Developed by <a href="https://theshawa-dev.web.app" title="Visit Theshawa Dasun" target="_blank">Theshawa
            Dasun</a></p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>