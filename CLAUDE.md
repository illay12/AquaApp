# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

AquaServ Tulcea — a Laravel 12 web application for a Romanian regional water utility company (operator de apă și canal). The app is in Romanian.

## Commands

```bash
# Full dev environment (server + queue + pail + vite hot-reload, all concurrently)
composer run dev

# Build frontend assets
npm run build

# Run all tests
composer run test
# or
php artisan test

# Run a single test
php artisan test --filter TestName

# Code style fix (Laravel Pint)
./vendor/bin/pint

# Database migrations
php artisan migrate

# Clear config cache
php artisan config:clear
```

## Architecture

**Stack:** Laravel 12, PHP 8.2+, SQLite (`database/database.sqlite`), Bootstrap 5.3 + Bootstrap Icons (CDN), Tailwind CSS v4 (via Vite), phpspreadsheet for Excel.

### Three Authentication Systems

This is the most important architectural detail — there are three separate, independent auth systems:

1. **Client auth** — Standard Laravel `Auth` facade + `User` model. Clients log in at `/client/login` with email/password. Protected routes use `middleware('auth')`. The `User` model has a `rol` field.

2. **Dispecerat auth** — Custom session-based auth for internal dispatch operators. `DispeceratUser` model stores a hashed token. `DispeceratAuth` middleware checks `session('dispecerat_user')` and `session('dispecerat_token')` against `DispeceratUser::verificaToken()`.

3. **Admin auth** — Reuses Laravel `Auth` but requires `rol === 'admin'` on the `User` model. Protected by `AdminAuth` middleware. Handles meter index Excel export/import and data comparison.

### Route Groups

- **Public:** `/`, `/despre/*`, `/servicii/*`, `/informatii/*`, `/anunturi/*`, `/contact`, `/gdpr`, `/cookies`, `/sitemap`, `/program-casierii`
- **Client zone** (`/client`): login, dashboard (auth-protected), facturi, consum, date-personale, index-contor, avarie, contract
- **Dispecerat** (`/dispecerat`): CRUD for announcements (`Anunt`) + water quality bulletins (`BuletinAnaliza`), file attachments (`AnuntFisier`)
- **Admin** (`/admin`): Excel export/import of meter indices (`Contor`), data comparison

### Models

- `Anunt` — announcements with auto-slug generation from `titlu`, scopes for `categorie` and `cauta`
- `AnuntFisier` — files attached to announcements
- `BuletinAnaliza` — water quality analysis bulletins
- `Client` — client data (separate from `User`)
- `Contor` — meter/counter readings
- `DispeceratUser` — dispatch operators with token-based auth
- `User` — Laravel standard user with added `rol` field (`admin`, etc.)

### Views

- `resources/views/layouts/app.blade.php` — single main layout; all global CSS variables (`--aqua-primary`, etc.) and Bootstrap 5 are defined here; uses `@yield('content')`, `@yield('page_hero')`, `@yield('alert_band')`, `@stack('styles')`, `@stack('scripts')`
- `resources/views/pages/` — public-facing pages organized by section
- `resources/views/admin/` — admin panel views
- `resources/views/dispecerat/` — dispatch panel views
- `resources/views/components/` — reusable Blade components (e.g., `cookie-banner`)

### Design System

CSS custom properties are defined in `layouts/app.blade.php`:
- `--aqua-primary: #0077b6`, `--aqua-dark: #023e8a`, `--aqua-accent: #00b4d8`
- Utility classes: `.btn-aqua`, `.btn-outline-aqua`, `.badge-aqua`, `.section-title`, `.quick-access-card`, `.news-item`, `.page-hero`, `.alert-band`
- Fonts: Nunito (body), Merriweather (headings/brand)
- Tailwind CSS is included via Vite but Bootstrap 5.3 (CDN) is the primary UI framework
