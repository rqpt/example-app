# Teruza Project

Thanks for considering me for the position!

Below are some setup instructions, in case you want to setup the project yourself,
else there are some screenshots that should give you the gist of things.

Please note, I got stuck with the CSRF and XSS requirements. It's probably something
simple I'm overlooking, but I've commented out those implementations for now.

Also there isn't any handling in place for network issues with the API or invalid pairs
\- will need to revisit that later. I have added some tests though.

## Setup

1. Run this oneliner

```bash
git clone https://github.com/rqpt/example-app \
&& cd example-app \
&& cp .env.example .env \
&& touch ./database/database.sqlite \
&& mkdir ./resources/svg \
&& composer install --no-dev --no-interaction --optimize-autoloader \
&& npm install \
&& npm run build \
&& php artisan migrate \
&& php artisan key:generate \
&& php artisan icons:cache \
&& php artisan optimize \
&& php artisan serve
```

2. Navigate to http://127.0.0.1:8000

## Screenshots

![20240903_09h25m14s_grim](https://github.com/user-attachments/assets/7df8f776-e7f3-4825-b304-dbbbc978a68e)

![20240903_09h26m15s_grim](https://github.com/user-attachments/assets/0e74103b-3b52-483c-9866-b9d763d37dba)

![20240902_23h10m10s_grim](https://github.com/user-attachments/assets/c2400428-dbe2-4bb7-a873-162d8346e9d0)

![20240902_23h10m33s_grim](https://github.com/user-attachments/assets/67ef8624-3f6a-4cf8-b11e-6ccb07048757)

![20240903_09h27m37s_grim](https://github.com/user-attachments/assets/1d898c01-62f4-4a6a-8a7a-abc1a87ee927)

![20240903_09h28m47s_grim](https://github.com/user-attachments/assets/53f70787-aaf5-4ff8-8055-76ff7e8ce6a5)
