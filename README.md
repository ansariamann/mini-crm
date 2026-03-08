# Mini CRM (Laravel Practical Assignment)

Very small Laravel app for the practical assignment: manage **Employees** linked to **Companies**.

## Features

-   Login-based access (registration disabled)
-   Employees: list, create, edit, delete
-   Companies: used as a dropdown when creating/editing employees

## Requirements

-   PHP + Composer
-   MySQL/MariaDB (XAMPP works)
-   Node.js + npm (Vite assets)

## Setup (local)

1. `composer install`
2. Copy `.env.example` to `.env` and set `DB_*`
3. `php artisan key:generate`
4. `php artisan migrate`
5. `npm install`
6. `npm run dev` (or `npm run build`)

## Run

-   `php artisan serve` then open `http://127.0.0.1:8000`
-   If using Apache/XAMPP, point your site/document root to `public/`

## App URLs

-   Login: `/`
-   Home: `/home`
-   Employees: `/Employee`

## Notes

-   If you can’t log in, create a user record in the `users` table (registration is disabled).

> App\Models\Company::factory(50)->create();

// 1. Ensure you have companies (if you haven't created them yet)
\App\Models\Company::factory(10)->create();

// 2. Get all existing companies
$companies = \App\Models\Company::all();

// 3. Create 50 employees, assigning each to a random company from the list
\App\Models\Employee::factory(50)->create([
'company_id' => fn() => $companies->random()->id
]);
