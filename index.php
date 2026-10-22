<?php
/**
 * Einstiegspunkt des Webshops (Front Controller)
 *
 * Jede Seite wird über index.php aufgerufen:
 *   index.php                 -> pages/startseite.php
 *   index.php?seite=produkte  -> pages/produkte.php
 *
 * Die Seite wird zuerst in einen Puffer geladen und danach in
 * templates/layout.php eingesetzt. So können Seiten auch noch
 * weiterleiten (z.B. nach dem Login), bevor HTML ausgegeben wird.
 */

require_once __DIR__ . '/app/bootstrap.php';

// Erlaubte Seiten (Whitelist) – neue Seiten hier eintragen
$seiten = [
    'startseite',
    'produkte',
    'produkt',
    'warenkorb',
    'kasse',
    'login',
    'registrieren',
    'logout',
    'konto',
    'kontakt',
    'impressum',
];

$seite = $_GET['seite'] ?? 'startseite';

if (!in_array($seite, $seiten, true)) {
    http_response_code(404);
    $seite = '404';
}

// Seite laden (.php oder .html)
$seitentitel = '';
$datei = PAGES_PATH . '/' . $seite . '.php';
if (!is_file($datei)) {
    $datei = PAGES_PATH . '/' . $seite . '.html';
    $seitentitel = ucfirst($seite);   // HTML-Seiten können keinen Titel setzen
}

ob_start();
require $datei;
$inhalt = ob_get_clean();

require TEMPLATES_PATH . '/layout.php';
