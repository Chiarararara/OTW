<?php
/**
 * Grundgerüst jeder Seite
 * Variablen: $seitentitel, $inhalt, $seite
 */
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e(($seitentitel ? $seitentitel . ' – ' : '') . SHOP_NAME) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
</head>
<body>

<?php require TEMPLATES_PATH . '/header.php'; ?>

<main class="container">
    <?= $inhalt ?>
</main>

<?php require TEMPLATES_PATH . '/footer.php'; ?>

</body>
</html>
