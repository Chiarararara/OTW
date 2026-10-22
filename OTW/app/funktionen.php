<?php
/**
 * Hilfsfunktionen für den ganzen Shop
 */

/** Text sicher in HTML ausgeben (Schutz vor XSS) */
function e($wert): string
{
    return htmlspecialchars((string)$wert, ENT_QUOTES, 'UTF-8');
}

/** Link auf eine Seite erzeugen, z.B. url('produkt', ['id' => 3]) */
function url(string $seite = 'startseite', array $parameter = []): string
{
    $parameter = ['seite' => $seite] + $parameter;
    return 'index.php?' . http_build_query($parameter);
}

/** Auf eine andere Seite weiterleiten */
function weiterleiten(string $seite, array $parameter = []): void
{
    header('Location: ' . url($seite, $parameter));
    exit;
}

/** Preis formatieren, z.B. CHF 24.90 */
function preis($betrag): string
{
    return WAEHRUNG . ' ' . number_format((float)$betrag, 2, '.', "'");
}

/** Ist ein Kunde angemeldet? */
function eingeloggt(): bool
{
    return isset($_SESSION['kunde_id']);
}

// TODO: Warenkorb-Funktionen
// TODO: CSRF-Schutz für Formulare
