# AquaApp

Platformă web pentru operator regional de servicii de alimentare cu apă și canalizare, construită cu Laravel 12.

## Funcționalități

### Zonă publică
- **Homepage** cu ultimele anunțuri
- **Servicii**: alimentare cu apă, canalizare, epurare, avize și acorduri
- **Anunțuri**: listă cu paginație, filtrare pe categorie și căutare
- **Informații publice**: tarife, calitatea apei, legislație, formulare, bugete, hotărâri AGA, buletine informative, contracte și achiziții
- **Transparență**: rapoarte evaluare, cod etic, componența CA, guvernanță corporativă, audit, rapoarte CNR
- **Contact** cu formular AJAX și throttling (30 req/min)
- **Căutare globală** peste anunțuri
- Pagini GDPR, Cookies, Sitemap

### Zonă clienți (autentificat)
- Dashboard cu date personale, facturi, istoric consum
- Transmitere index contor cu verificare client (cod + telefon/email)
- Raportare avarii
- Vizualizare detalii contract

### Zonă dispecerat
- Gestionare anunțuri (CRUD complet)
- Upload fișiere atașate (PDF, DOCX, XLSX)
- Gestionare buletine lunare de analiză a calității apei
- Autentificare cu token cu expirare la 8 ore

### Zonă admin
- Import/export indecși contor (CSV/XLSX) pe lună și an
- Sincronizare date cu sistem extern
- Comparare exporturi
- Gestionare documente

## Tehnologii

- **Backend**: Laravel 12, PHP 8.2+
- **Bază de date**: MySQL (producție) / SQLite (development)
- **Frontend**: Bootstrap 5.3, Bootstrap Icons 1.11, Vite
- **Pachete**: PHPSpreadsheet (import/export Excel), mews/purifier (sanitizare HTML)
- **Mail**: SMTP

## Instalare

```bash
# 1. Clonare și dependențe
git clone <repo-url>
cd AquaApp
composer install

# 2. Configurare
cp .env.example .env
php artisan key:generate

# 3. Bază de date
php artisan migrate

# 4. Storage
php artisan storage:link

# 5. Pornire server
php artisan serve
```

## Configurare `.env`

```env
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aquaapp
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_FROM_ADDRESS=...

DISPECERAT_USER=dispecerat
DISPECERAT_PASSWORD=<hash-bcrypt>
```

## Structura bazei de date

| Tabelă | Descriere |
|--------|-----------|
| `users` | Clienți și administratori (Laravel Auth) |
| `clienti` | Date clienți (cod unic, telefon, email, adresă) |
| `contoare` | Contoare per client cu indecși vechi/noi |
| `anunturi` | Anunțuri publice cu slug auto-generat |
| `anunt_fisiere` | Fișiere atașate anunțurilor (PDF/DOCX/XLSX) |
| `dispecerat_users` | Utilizatori dispecerat cu token sesiune |
| `buletine_analiza` | Buletine lunare calitate apă |

## Autentificare

Aplicația are trei sisteme de autentificare separate:

| Rol | Metodă | Guard |
|-----|--------|-------|
| Client | Email + parolă | Laravel Auth (`users`) |
| Dispecerat | Username + parolă, token 8h | Custom (`dispecerat_users`) |
| Admin | Username + parolă, rol `admin` | Laravel Auth (`users`) |

## Scripturi

```bash
composer run dev      # Server + queue listener + log viewer în paralel
composer run test     # Rulare teste PHPUnit
```

## Structura proiect

```
app/
├── Http/
│   ├── Controllers/     # 14 controllere (Home, Anunt, Client, Dispecerat, Admin, ...)
│   └── Middleware/      # DispeceratAuth, AdminAuth, CookieConsent, SecurityHeaders
├── Models/              # 7 modele Eloquent
resources/
├── views/
│   ├── pages/           # Pagini publice (home, servicii, informatii, transparenta, ...)
│   ├── dispecerat/      # Panou dispecerat
│   ├── admin/           # Panou admin
│   └── components/      # Sidebar-uri, cookie banner
routes/
└── web.php              # Toate rutele aplicației
```
