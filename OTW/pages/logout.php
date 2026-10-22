<?php
/**
 * Abmelden
 * Aufruf: index.php?seite=logout
 */

unset($_SESSION['kunde_id']);
session_regenerate_id(true);

weiterleiten('startseite');
