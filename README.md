# e-ticket system

## About Repository

e-ticket is an online ticket system api based on Laravel 8. 
Backend system provide a complete ticket management CRUD API, 
with full role and permission based authentication and authorization.

## Tech Specification

- Laravel 8

## Features

- User Role and permission Management
- Role and permission based Authentication
- Role and permission based Authorization
- Email activation and notifications

## Installation

- `git clone https://github.com/SBTHDR/e-ticket-api.git`
- `cd e-ticket-api/`
- `cp .env.example .env`
- `composer install`
- Run `php artisan key:generate`
- Update `.env` and set your database credentials
- `php artisan migrate`
- `npm install`
- `npm run dev`
- `php artisan serve`

## License

[MIT license](https://opensource.org/licenses/MIT).
