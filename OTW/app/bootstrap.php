<?php
/**
 * Wird als Erstes geladen: Konfiguration, Pfade, Session, Funktionen
 */

require_once __DIR__ . '/config.php';

// Pfade
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('PAGES_PATH', ROOT_PATH . '/pages');
define('TEMPLATES_PATH', ROOT_PATH . '/templates');

// Fehleranzeige
ini_set('display_errors', DEBUG ? '1' : '0');
error_reporting(E_ALL);

// Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once APP_PATH . '/datenbank.php';
require_once APP_PATH . '/funktionen.php';
