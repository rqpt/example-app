# Teruza Project

## Setup

1. Clone the project

```bash
git clone https://github.com/rqpt/example-app && cd example-app
```

    2. Make a .env from the existing example file

```bash
cp .env.example .env
```

2. Install dependencies

```bash
composer install && npm install
```

3. Run migrations

```bash
php artisan migrate
```

4. Serve the application

```bash
php artisan serve
```

5. Navigate to (http://127.0.0.1:8000)[http://127.0.0.1:8000]
