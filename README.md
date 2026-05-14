<h1 align="center">AquaApp</h1>

<p align="center">
  Full-stack web platform for a regional water & sewerage utility operator
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 12"/>
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2"/>
  <img src="https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"/>
  <img src="https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap 5.3"/>
</p>

---

## Overview

AquaApp is a production-ready web application built for a public utility company managing water supply and sewerage services. It serves multiple user types — citizens, field operators, and administrators — each with a distinct interface tailored to their workflow.

The system handles everything from public transparency pages required by Romanian law to authenticated client portals with meter index submission, and an internal dispatch panel for publishing announcements and quality reports.

---

## Features

### Public Portal
- Dynamic homepage with latest announcements
- Services pages: water supply, sewerage, wastewater treatment, permits
- **20+ static & dynamic information pages** — tariffs, water quality reports, legislation, procurement contracts, AGA resolutions, budgets
- Transparency section with 8+ governance pages (ethics code, board composition, CNR reports, audit)
- Global search with rate limiting (30 req/min)
- Contact form with AJAX submission and CSRF protection
- GDPR, Cookies consent, Sitemap

### Client Portal (authenticated)
- Account dashboard: personal data, invoices, consumption history
- **Meter index submission** with multi-factor client verification (client code + phone/email)
- Fault & outage reporting
- Contract details viewer

### Dispatch Panel
- Full CRUD for public announcements with rich text and file attachments (PDF, DOCX, XLSX)
- Monthly water quality bulletin management with upload/delete
- Session-based authentication with **8-hour expiring tokens**
- Separate user table and custom auth guard

### Admin Panel
- **Bulk import/export of meter readings** via CSV/XLSX (by month & year)
- External data synchronization
- Export comparison & validation tool
- Document management

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Framework | Laravel 12 |
| Language | PHP 8.2+ |
| Database | MySQL 8 (prod) / SQLite (dev) |
| Frontend | Bootstrap 5.3, Bootstrap Icons 1.11, Vite |
| Excel | PHPSpreadsheet 5.5 |
| HTML Sanitization | mews/purifier 3.4 |
| Testing | PHPUnit 11 |
| Dev Tools | Laravel Pail (logs), Laravel Pint (formatter) |

---

## Architecture Highlights

**Three independent authentication systems** running in parallel:

| Role | Method | Storage | Guard |
|------|--------|---------|-------|
| Client | Email + password | `users` table | Laravel default Auth |
| Dispatch operator | Username + password + 8h token | `dispecerat_users` table | Custom middleware |
| Admin | Username + password + role check | `users` table | Custom `AdminAuth` middleware |

**Custom middleware stack:**
- `DispeceratAuth` — validates session + time-limited token
- `AdminAuth` — verifies authenticated user has `role = 'admin'`
- `CookieConsent` — GDPR-compliant banner
- `SecurityHeaders` — sets X-Frame-Options, CSP, etc.

**14 controllers** covering public pages, client portal, dispatch panel, admin panel, file downloads, search, and contact.

---

## Database Schema

| Table | Description |
|-------|-------------|
| `users` | Clients and admins (Laravel Auth) |
| `clienti` | Customer registry (unique client code, phone, email, address) |
| `contoare` | Water meters per client with old/new index values |
| `anunturi` | Public announcements with auto-generated slugs |
| `anunt_fisiere` | Files attached to announcements (PDF/DOCX/XLSX) |
| `dispecerat_users` | Dispatch operators with session tokens |
| `buletine_analiza` | Monthly water quality bulletins |

Relationships:
- `anunturi` → `anunt_fisiere` (one-to-many, cascade delete)
- `clienti` → `contoare` (one-to-many, cascade on update)

---

## Getting Started

```bash
# Install dependencies
composer install

# Environment setup
cp .env.example .env
php artisan key:generate

# Database
php artisan migrate

# Link storage for public files
php artisan storage:link

# Start development server
composer run dev   # runs server + queue worker + log viewer concurrently
```

### Environment variables

```env
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_DATABASE=aquaapp
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your@email.com
MAIL_FROM_ADDRESS=your@email.com

DISPECERAT_USER=dispecerat
DISPECERAT_PASSWORD=<bcrypt-hash>
```

---

## Project Structure

```
app/
├── Http/
│   ├── Controllers/        # 14 controllers
│   │   ├── HomeController
│   │   ├── AnuntController
│   │   ├── ClientController
│   │   ├── DispeceratController
│   │   ├── AdminController
│   │   └── ...
│   └── Middleware/         # DispeceratAuth, AdminAuth, CookieConsent, SecurityHeaders
├── Models/                 # 7 Eloquent models
resources/
└── views/
    ├── pages/              # Public portal (home, services, info, transparency, contact)
    ├── dispecerat/         # Dispatch panel
    ├── admin/              # Admin panel
    └── components/         # Reusable Blade components (sidebars, cookie banner)
```

---

## Running Tests

```bash
composer run test
```
