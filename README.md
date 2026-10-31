# Laravel POS: Forms, Validation and File Upload (IT0049 - TFA7)

The TFA6 POS app extended with create and edit forms for customers and users, request validation, and avatar upload for users. Pages: Home (`/`), About (`/about`), Customer Accounts (`/customers`), User Accounts (`/users`), plus create and edit pages for both.

## Requirements

PHP 8.2 or newer with the GD extension (included in XAMPP), Composer, and Git. The default database is SQLite, so no MySQL setup is needed.

## Setup

1. Clone the repository: `git clone <your-repo-url>` then `cd <project-folder>`
2. Install packages (this also installs Intervention Image): `composer install`
3. Create the environment file: `copy .env.example .env` on Windows, or `cp .env.example .env`
4. Generate the app key: `php artisan key:generate`
5. Create the tables and sample data: `php artisan migrate:fresh --seed`
6. Link the public storage folder so uploaded avatars can be shown: `php artisan storage:link`
7. Start the server: `php artisan serve`
8. Visit http://127.0.0.1:8000

On Windows, `storage:link` may need Command Prompt opened as administrator.

## Features

- Create and edit customers: `full_name` required, `email` required and valid. Errors show under each field and typed values are kept with `old()`.
- Create and edit users: `username` required and unique, `full_name` required.
- Avatar upload on the user edit form: must be an image (jpg, jpeg, png or webp) of at most 2MB. Intervention Image crops it to a 150x150 thumbnail, which is saved with `Storage::disk('public')`. Only the path (for example `avatars/xxxx.jpg`) is saved in the `avatar` column.
- The User Accounts page shows each avatar, or a placeholder image if none was uploaded.

## Database

- `customers`: id, full_name, email, phone, timestamps
- `users`: id, username (unique), full_name, avatar (nullable), timestamps

Migrations are in `database/migrations`, including `add_avatar_to_users_table`. Seeders are in `database/seeders`.

## Hosted version

Add your live link here: <your-hosted-url>
