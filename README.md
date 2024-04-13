## Recap Laravel + Vite

### Creazione progetto
- composer create-project --prefer-dist laravel/laravel:^9.2 recap_laravel_vite
- npm install

### Pacchetti di base
- npm install cross-env
- composer require pacificdev/laravel_9_preset
- php artisan preset:ui bootstrap
- npm install
- composer require doctrine/dbal
- npm install @fortawesome/fontawesome-free

### Migrazione, Seeder e controller
- php artisan make:controller --resource BookController --model Book
- php artisan make:migration create_books_table
- php artisan make:seeder BooksSeeder

### Rotte e viste
- npm install @fortawesome/fontawesome-free