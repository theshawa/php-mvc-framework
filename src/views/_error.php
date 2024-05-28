<?php
/**
 * @var Exception $error
 */
$message = $error->getMessage();
$code = $error->getCode();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
</head>
<body>
<div class="container-sm mt-5 text-center">
    <h2>Error: <?php echo $code; ?></h2>
    <p><?php echo $message; ?></p>
</div>

<p></p>
</body>
</html>