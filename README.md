# 📝 ToDo List (PHP + MySQL)

Jednoduchá webová aplikácia na správu úloh (ToDo list), vytvorená v PHP s použitím MySQL databázy.  
Aplikácia umožňuje používateľom vytvoriť si účet, prihlásiť sa a následne spravovať svoje vlastné úlohy – pridávať nové, upravovať existujúce alebo ich mazať.

Každý používateľ vidí iba svoje úlohy, ktoré sú uložené v databáze a prepojené cez jeho používateľské ID.

---

## ⚙️ Funkcionalita

### 👤 Používateľ
- Registrácia nového účtu
- Prihlásenie do systému
- Zmena hesla
- Obnovenie hesla (zobrazenie aktuálneho – len pre účely projektu)

### 📋 Úlohy
- Pridanie úlohy (názov, popis, dátum)
- Zobrazenie vlastných úloh
- Úprava úlohy podľa ID
- Vymazanie úlohy podľa ID

---

## 🧠 Ako aplikácia funguje

- Po prihlásení sa uloží `user_ID` do session
- Každá úloha je viazaná na konkrétneho používateľa (`user_ID`)
- Pri načítaní stránky sa zobrazia len úlohy prihláseného používateľa
- Operácie ako update a delete sa vykonávajú na základe `task_ID`

---

## 🗂️ Štruktúra súborov

- `index.php` – prihlasovanie používateľa  
- `main.php` – hlavná stránka (ToDo list)  
- `registracia.php` – registrácia  
- `zabudh.php` – zabudnuté heslo  
- `zmenith.php` – zmena hesla  

---

## 🛢️ Databáza

### Databáza: `stranka`

### Tabuľka `user`
```sql
CREATE TABLE user (
    user_ID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    password VARCHAR(255)
);