# Divide by Zero

## 📌 Descrizione del Progetto

Divide by Zero è una piattaforma web creata per un'associazione studentesca con l'obiettivo di promuovere eventi e attività di gruppo. Lo scopo è quello di costruire una solida community extracurriculare, offrendo agli studenti uno spazio per esprimersi e crescere, non solo in ambito informatico.

---

## 👥 Autori

- **Maone Alessandro** – Matricola: 1945149  
- **Pernazza Giovanni** – Matricola: 1936239

---

## 🚀 Funzionalità

- **Visualizzazione Eventi:** Pagina dinamica che mostra gli eventi in programma, con la possibilità di visualizzare informazioni dettagliate.
- **Registrazione e Login:** Sistema di autenticazione per gli utenti, con pagine dedicate per l'iscrizione e l'accesso.
- **Area Riservata:** Accesso a funzionalità aggiuntive come iscrizione agli eventi e gestione del profilo.
- **Newsletter:** Iscrizione e gestione email in un database.
- **Community:** Collegamenti ai canali social dell'associazione.
- **Gestione Profilo:** Modifica dei propri dati personali.
- **Prenotazioni:** Gestione delle iscrizioni personali agli eventi.

---

## 🧱 Setup del Database

Per il corretto funzionamento del sito, è necessario creare un database con le seguenti tabelle:

- **`users`**: Memorizza i dati degli utenti registrati.
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `username` (VARCHAR)
  - `email` (VARCHAR, UNIQUE)
  - `password` (VARCHAR)
- **`events`**: Contiene le informazioni sugli eventi.
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `day` (INT)
  - `month` (VARCHAR)
  - `time` (TIME)
  - `title` (VARCHAR)
  - `description` (TEXT)
  - `image` (VARCHAR)
- **`newsletter`**: Salva le email degli iscritti alla newsletter.
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `email` (VARCHAR, UNIQUE)
- **`partecipants`**: Associa gli utenti agli eventi a cui si sono iscritti.
  - `id` (INT, PRIMARY KEY, AUTO_INCREMENT)
  - `user_id` (INT, FOREIGN KEY REFERENCES users(id))
  - `event_id` (INT, FOREIGN KEY REFERENCES events(id))

---

## 🔧 Installazione

1. Configura un web server (Apache/Nginx) con supporto PHP.
2. Crea il database e le tabelle.
3. Configura i file di connessione al database (`connection.inc.php`, ecc.).
4. Carica i file nel tuo server.
5. Accedi da browser (`http://localhost/index.html`).

---

## 📦 Tecnologie Utilizzate

- **Frontend:** HTML, CSS, JavaScript, Bootstrap  
- **Backend:** PHP, MySQL  
- **Altro:** AJAX, sessioni PHP

---

## 📁 Struttura del Progetto

```
/
├── assets/
├── bootstrap/
├── html/
│   ├── logged/
│   └── ...
├── img/
├── script.js
├── style.css
└── README.md
```

| Directory | Descrizione |
|----------|-------------|
| `assets/`, `bootstrap/` | Librerie JS/CSS (es. Bootstrap) |
| `img/` | Immagini, loghi e locandine eventi |
| `html/` | File `.html` e `.php` |
| `html/logged/` | Sezione protetta per utenti loggati |

---

## 🌐 Pagine principali e flusso

- `index.html`: Homepage pubblica con header, footer, e banner.
- `community.html`: Link ai social dell’associazione.
- `whoweare.html`: Info sul progetto e gli sviluppatori.
- `events.php`: Carica dinamicamente gli eventi da DB.
- `login.php`, `signup.php`: Autenticazione utenti.
- `logged.php`: Homepage post-login con menu personalizzato.
- `events_logged.php`: Visualizzazione e iscrizione eventi.
- `settings_logged.php`: Modifica dati utente.
- `prenotazioni_logged.php`: Eventi prenotati dall’utente.
- `newsletter.php`: Aggiunge email alla tabella newsletter.
- `ajaxfile.php`, `ajaxfile_logged.php`: Caricamento modale eventi.
- `dbconn_toevents.php`, `dbconn_topartecipants.inc.php`: Connessioni DB.
- `logout.php`: Logout e redirect alla homepage.
- `iscrizione.php`, `unsub.php`: Iscrizione/rimozione da eventi.
- `change.php`: Modifica delle credenziali utente.

---

## ✅ Requisiti

- PHP ≥ 7.x
- MySQL/MariaDB
- Apache/Nginx
- Browser moderno

---

## 📬 Contatti

Per qualsiasi informazione o collaborazione, contattaci tramite i canali social presenti nel sito.

