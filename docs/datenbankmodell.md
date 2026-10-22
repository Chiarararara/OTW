# Datenbankmodell

```mermaid
erDiagram
    KATEGORIE ||--o{ PRODUKT : enthaelt
    KUNDE ||--o{ BESTELLUNG : gibt_auf
    BESTELLUNG ||--|{ BESTELLPOSITION : besteht_aus
    PRODUKT ||--o{ BESTELLPOSITION : kommt_vor_in

    KATEGORIE {
        int id PK
        varchar name
        text beschreibung
    }
    PRODUKT {
        int id PK
        int kategorie_id FK
        varchar name
        text beschreibung
        decimal preis
        int lagerbestand
        varchar bild
        tinyint aktiv
        timestamp erstellt_am
    }
    KUNDE {
        int id PK
        varchar vorname
        varchar nachname
        varchar email UK
        varchar passwort_hash
        varchar strasse
        varchar plz
        varchar ort
        timestamp erstellt_am
    }
    BESTELLUNG {
        int id PK
        int kunde_id FK
        timestamp bestelldatum
        enum status
        decimal gesamtbetrag
    }
    BESTELLPOSITION {
        int id PK
        int bestellung_id FK
        int produkt_id FK
        int menge
        decimal einzelpreis
    }
```

| Tabelle           | Zweck                                                        |
|-------------------|--------------------------------------------------------------|
| `kategorie`       | Produktkategorien                                            |
| `produkt`         | Artikel mit Preis, Lagerbestand und Bild                     |
| `kunde`           | Registrierte Kunden (Passwort nur als Hash)                  |
| `bestellung`      | Bestellkopf: Kunde, Datum, Status, Total                     |
| `bestellposition` | Artikel einer Bestellung inkl. Preis zum Bestellzeitpunkt    |
