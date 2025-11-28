# Laravel Catalunya

A community-driven Laravel site for Laravel enthusiasts in Catalonia.

## Overview
This repository contains the Laravel Catalunya application. It's a Laravel v12 application that uses Livewire, Tailwind v4, Pest for tests and other standard Laravel tooling.

## Key versions
- PHP: 8.4
- Laravel Framework: v12
- Livewire: v3
- Tailwind CSS: v4
- Pest: v4

## Quick setup (local)
1. Clone the repo

2. Install PHP dependencies:
   composer install

3. Install JS dependencies:
   nvm use
   npm install

4. Environment:
   cp .env.example .env
   php artisan key:generate

5. Database:
   - Configure .env
   - Run migrations & seeders:
     php artisan migrate --seed

6. Storage:
   php artisan storage:link

## Development
- Start Vite dev server:
  npm run dev
  or, if available in composer scripts:
  composer run dev

- Build production assets:
  npm run build

If you see Vite manifest errors, run the build or dev commands above.

## Code style & formatting
- The project uses Laravel Pint. Run before committing:
  ```bash
  composer format
  ```
  
## PHPStan  

- Run static analysis. Run before committing:
    ```bash
    composer analyse
    ```

## Testing
- Run the test suite:
    ```bash
    composer test
    ```
- Tests are written with Pest (v4).
