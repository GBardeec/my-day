## Setup instructions
### Requirements
1. PHP ^8.1
2. NPM ^6.13
3. MySQL DB

#### Laravel
- `composer install`
- `cp .env.example .env`
- modify **.env**
    1. Set **APP_URL** to current URL
    2. Set **DB_***
- `php artisan migrate`

#### Frontend
- `npm i`
- `npm run [dev/prod/watch]`

`php artisan serve` or **nginx** setup

#### Other
- To study the full functionality of the application register

