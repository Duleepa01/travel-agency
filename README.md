# Travel Agency Management System

A full-featured travel agency management system built with **Laravel 12**, developed as a learning project to build professional-grade Laravel skills from the ground up — covering database design, Eloquent relationships, validation, and clean MVC architecture.

> This project is still under active development. See [Roadmap](#roadmap) below for what's built and what's coming.

---

## Tech Stack

- **Framework:** Laravel 12
- **Language:** PHP 8.2
- **Database:** MySQL
- **Templating:** Blade
- **Package Manager:** Composer

---

## Features

### Implemented

- **Customer Management** — full CRUD (create, view, edit, delete)
  - Server-side validation with error display and input retention (`old()`)
  - Nationality and country of residence tracked via a normalized `countries` reference table
- **Countries Reference Table** — seeded with ISO 3166-1 country data (name, alpha-2, alpha-3 codes)
- **Package Management** — in progress
  - Core package fields (name, price, duration, capacity, status)
  - Many-to-many relationship with destinations

### 🚧 Planned

- Tour Package full CRUD with destination selection
- Booking Management
- Payment Tracking
- Authentication & Role-Based Access (Admin / Employee)
- Dashboard & Analytics
- Search & Filtering
- Image Uploads
- Email Notifications
- Reports

---

## Database Design

Key entities and relationships:

| Table | Relationship | Notes |
|---|---|---|
| `users` | — | Employees/Admins (Laravel default auth table) |
| `customers` | `belongsTo` User (created_by), `belongsTo` Country (nationality & residence) | Nationality/residence use `SET NULL` on delete to preserve records |
| `countries` | `hasMany` Destination, Customer | ISO reference table |
| `destinations` | `belongsTo` Country, `belongsToMany` Package | |
| `packages` | `belongsTo` User (created_by), `belongsToMany` Destination | |
| `destination_package` | Pivot table | Links packages to their destinations |

**Design decisions worth noting:**
- Foreign keys to `users` use `nullOnDelete()` rather than `cascadeOnDelete()` — deleting an employee should never delete related business records (customers, packages).
- Money fields use `decimal`, not `float`, to avoid floating-point rounding errors.
- Schema changes to already-migrated tables follow an **expand-and-contract** pattern (add new columns → backfill → drop old columns) rather than destructive in-place changes.

---

## Getting Started

### Prerequisites

- PHP 8.2+
- Composer
- MySQL

### Installation

```bash
git clone <repo-url>
cd travel-agency
composer install
cp .env.example .env
php artisan key:generate
```

Configure your database in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_agency
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations and seeders:

```bash
php artisan migrate
php artisan db:seed --class=CountrySeeder
```

Start the development server:

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000`.

---

## Project Structure

```
app/
├── Http/Controllers/     # Route handlers
├── Models/               # Eloquent models
database/
├── migrations/           # Schema version history
├── seeders/              # Reference data (e.g. CountrySeeder)
resources/
├── views/
│   ├── layouts/          # Shared Blade layout
│   ├── customers/        # Customer CRUD views
│   ├── packages/         # Package CRUD views
routes/
├── web.php               # Application routes
```

---

## Roadmap

- [x] Project setup & MySQL configuration
- [x] Database schema: users, customers, countries, packages, destinations, pivot table
- [x] Eloquent models with relationships
- [x] Customer CRUD with validation
- [ ] Package CRUD with destination selection
- [ ] Booking management
- [ ] Payment tracking
- [ ] Authentication & roles
- [ ] Dashboard & reports

---

