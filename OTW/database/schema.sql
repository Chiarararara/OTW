-- =====================================================
--  Webshop – Datenbankschema (Tabellen)
--  Import: phpMyAdmin > Importieren > schema.sql
-- =====================================================

CREATE DATABASE IF NOT EXISTS webshop
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE webshop;

-- Reihenfolge wegen Fremdschlüsseln beachten
DROP TABLE IF EXISTS bestellposition;
DROP TABLE IF EXISTS bestellung;
DROP TABLE IF EXISTS produkt;
DROP TABLE IF EXISTS kategorie;
DROP TABLE IF EXISTS kunde;

-- -----------------------------------------------------
-- Kategorien
-- -----------------------------------------------------
CREATE TABLE kategorie (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name          VARCHAR(100) NOT NULL,
  beschreibung  TEXT
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Produkte
-- -----------------------------------------------------
CREATE TABLE produkt (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  kategorie_id  INT UNSIGNED NOT NULL,
  name          VARCHAR(150) NOT NULL,
  beschreibung  TEXT,
  preis         DECIMAL(10,2) NOT NULL CHECK (preis >= 0),
  lagerbestand  INT UNSIGNED NOT NULL DEFAULT 0,
  bild          VARCHAR(255) NULL,          -- Dateiname in img/produkte/
  aktiv         TINYINT(1) NOT NULL DEFAULT 1,
  erstellt_am   TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_produkt_kategorie
    FOREIGN KEY (kategorie_id) REFERENCES kategorie(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Kunden
-- -----------------------------------------------------
CREATE TABLE kunde (
  id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  vorname        VARCHAR(100) NOT NULL,
  nachname       VARCHAR(100) NOT NULL,
  email          VARCHAR(255) NOT NULL UNIQUE,
  passwort_hash  VARCHAR(255) NOT NULL,
  strasse        VARCHAR(150),
  plz            VARCHAR(10),
  ort            VARCHAR(100),
  erstellt_am    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Bestellungen
-- -----------------------------------------------------
CREATE TABLE bestellung (
  id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  kunde_id       INT UNSIGNED NOT NULL,
  bestelldatum   TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status         ENUM('offen','bezahlt','versendet','storniert') NOT NULL DEFAULT 'offen',
  gesamtbetrag   DECIMAL(10,2) NOT NULL,
  CONSTRAINT fk_bestellung_kunde
    FOREIGN KEY (kunde_id) REFERENCES kunde(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

-- -----------------------------------------------------
-- Bestellpositionen (n:m zwischen Bestellung und Produkt)
-- -----------------------------------------------------
CREATE TABLE bestellposition (
  id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  bestellung_id  INT UNSIGNED NOT NULL,
  produkt_id     INT UNSIGNED NOT NULL,
  menge          INT UNSIGNED NOT NULL CHECK (menge > 0),
  einzelpreis    DECIMAL(10,2) NOT NULL,     -- Preis zum Zeitpunkt der Bestellung
  CONSTRAINT fk_position_bestellung
    FOREIGN KEY (bestellung_id) REFERENCES bestellung(id)
    ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk_position_produkt
    FOREIGN KEY (produkt_id) REFERENCES produkt(id)
    ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

