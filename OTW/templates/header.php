<?php
/** Kopfbereich mit Navigation */
$menue = [
    'startseite' => 'Start',
    'produkte'   => 'Produkte',
    'warenkorb'  => 'Warenkorb',
];
?>
<header class="kopf">
    <div class="container kopf-inner">
        <a href="<?= url() ?>" class="logo"><?= e(SHOP_NAME) ?></a>

        <nav class="navigation">
            <?php foreach ($menue as $ziel => $text): ?>
                <a href="<?= url($ziel) ?>" class="<?= $seite === $ziel ? 'aktiv' : '' ?>"><?= e($text) ?></a>
            <?php endforeach; ?>

            <?php if (eingeloggt()): ?>
                <a href="<?= url('konto') ?>">Mein Konto</a>
                <a href="<?= url('logout') ?>">Abmelden</a>
            <?php else: ?>
                <a href="<?= url('login') ?>">Anmelden</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
