# Zusammenarbeit im Team

So arbeiten wir gemeinsam am Webshop, ohne uns gegenseitig Code zu überschreiben.

## 1. Einmalig: Projekt holen

**Mit GitHub Desktop**
1. *File → Clone repository → URL* → `https://github.com/Chiarararara/OTW`
2. Als *Local path* `C:\xampp\htdocs\OTW` wählen (dann läuft es direkt mit XAMPP)
3. *Clone*

**Mit dem Terminal**
```bash
cd C:\xampp\htdocs
git clone https://github.com/Chiarararara/OTW.git
```

Danach die Datenbank einrichten (siehe [README.md](README.md)).

## 2. Jedes Mal vor dem Arbeiten: aktualisieren

GitHub Desktop: **Fetch origin → Pull origin**
Terminal: `git pull`

So hast du immer den neusten Stand der anderen.

## 3. Eigene Aufgabe = eigener Branch

Nicht direkt auf `main` arbeiten, sondern pro Aufgabe einen Branch erstellen:

| Aufgabe                 | Branch-Name              |
|-------------------------|--------------------------|
| Neue Funktion           | `feature/warenkorb`      |
| Fehler beheben          | `fix/login-fehler`       |
| Design / CSS            | `design/startseite`      |
| Datenbank               | `db/bewertungen-tabelle` |

GitHub Desktop: *Current branch → New branch*
Terminal: `git checkout -b feature/warenkorb`

## 4. Speichern (Commit) und hochladen (Push)

- Oft und in kleinen Schritten committen
- Commit-Nachricht kurz und klar, was gemacht wurde:
  - ✅ `Warenkorb: Produkte entfernen`
  - ✅ `Login-Formular gestaltet`
  - ❌ `update`, `asdf`, `fertig`

GitHub Desktop: unten links Nachricht eingeben → *Commit to …* → *Push origin*
Terminal:
```bash
git add .
git commit -m "Warenkorb: Produkte entfernen"
git push
```

## 5. Pull Request: Änderungen in `main` übernehmen

1. Auf GitHub → *Compare & pull request*
2. Kurz beschreiben, was geändert wurde
3. Eine andere Person schaut es an und klickt *Merge*
4. Danach alle: `main` auswählen und **Pull**

## Aufteilung (damit es wenig Konflikte gibt)

Am besten arbeitet jede Person an anderen Dateien:

| Bereich            | Dateien                                  | Wer |
|--------------------|------------------------------------------|-----|
| Datenbank          | `database/`, `docs/datenbankmodell.md`   |     |
| Logik              | `app/`                                   |     |
| Seiten             | `pages/`                                 |     |
| Layout & Design    | `templates/`, `assets/css/`              |     |
| JavaScript         | `assets/js/`                             |     |

## Regeln

- `app/config.php` nur ändern, wenn es alle betrifft (eigene Passwörter nicht hochladen)
- Änderungen an der Datenbank immer in `database/schema.sql` nachtragen und im Team melden
- Code einrücken mit 4 Leerzeichen (siehe `.editorconfig`)
- Bei einem **Merge-Konflikt**: nicht in Panik geraten – die markierten Stellen (`<<<<<<<`, `=======`, `>>>>>>>`) zusammen anschauen und die richtige Version behalten
