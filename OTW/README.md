# Webshop (M290)

Grundgerüst für einen Webshop mit **PHP**, **MySQL**, **HTML**, **CSS** und **JavaScript**.

## Installation (XAMPP)

1. XAMPP starten → **Apache** und **MySQL** einschalten
2. Projektordner nach `C:\xampp\htdocs\OTW` kopieren
3. <http://localhost/phpmyadmin> → *Importieren* → `database/schema.sql`
   (optional danach `database/testdaten.sql`)
4. Zugangsdaten bei Bedarf in `app/config.php` anpassen
5. Öffnen: <http://localhost/OTW/>

## Ordnerstruktur

```
OTW/
├── index.php              Einstiegspunkt – lädt die gewünschte Seite
│
├── app/                   Logik (kein HTML)
│   ├── bootstrap.php      lädt Konfiguration, Session, Funktionen
│   ├── config.php         Datenbank-Zugang, Shopname, Währung
│   ├── datenbank.php      PDO-Verbindung: db()
│   └── funktionen.php     Hilfsfunktionen: e(), url(), preis() …
│
├── pages/                 eine Datei pro Seite (nur der Inhalt)
│   ├── startseite.php
│   ├── produkte.php
│   ├── produkt.php
│   ├── warenkorb.php
│   ├── kasse.php
│   ├── login.php
│   ├── registrieren.php
│   ├── logout.php
│   ├── konto.php
│   ├── kontakt.php
│   ├── impressum.html
│   └── 404.php
│
├── templates/             wiederverwendbare HTML-Teile
│   ├── layout.php         Grundgerüst (<html>, <head>, <body>)
│   ├── header.php         Kopfbereich + Navigation
│   └── footer.php         Fussbereich
│
├── assets/                öffentliche Dateien
│   ├── css/style.css
│   ├── js/script.js
│   └── img/
│
├── database/
│   ├── schema.sql         Tabellen
│   └── testdaten.sql      Beispieldaten
│
├── docs/
│   └── datenbankmodell.md ERD und Tabellenbeschreibung
│
├── .htaccess              sperrt interne Ordner im Browser
├── .gitignore
└── README.md
```

## So funktioniert es

Alle Seiten laufen über `index.php`:

| URL                              | lädt                    |
|----------------------------------|-------------------------|
| `index.php`                      | `pages/startseite.php`  |
| `index.php?seite=produkte`       | `pages/produkte.php`    |
| `index.php?seite=produkt&id=3`   | `pages/produkt.php`     |

Ablauf: `index.php` → `app/bootstrap.php` → Seite aus `pages/` → `templates/layout.php`

In PHP Links immer mit `url()` erzeugen:

```php
<a href="<?= url('produkt', ['id' => 3]) ?>">Produkt ansehen</a>
```

## Neue Seite hinzufügen

1. Datei `pages/meineseite.php` erstellen
2. In `index.php` den Namen `'meineseite'` in `$seiten` eintragen
3. Optional in `templates/header.php` ins Menü aufnehmen

## Datenbank

Siehe [docs/datenbankmodell.md](docs/datenbankmodell.md).
