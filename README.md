# Teruza Project

Thanks for considering me for the position!

Below are some setup instructions, in case you want to setup the project yourself,
a demo site that might or might not be up at the time you're reading this,
else some screenshots that should give you the gist of things.

Please note, I got stuck with the CSRF and XSS requirements. It's probably something
simple I'm overlooking, but I've commented out those implementations for now.

Also there isn't any handling in place for network issues with the API or invalid currency codes
\- I will need to revisit those later. I have added some tests though.

## Demo site

I spinned up a demo site in case you prefer not to install anything. I believe they only
last for one hour, so if it is down by the time you're reading this and you would like to
see it, just drop me a message.

http://teruza-rqpt.laravel-sail.site:8080/

Make sure your scheme is http, _**not**_ https.

## Local Setup

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

![20240903_13h58m18s_grim](https://github.com/user-attachments/assets/5c5c7896-ddff-4aa5-aff5-173e9dc4c1bc)

![20240903_14h00m25s_grim](https://github.com/user-attachments/assets/b60f49a9-7d9a-4dbf-931e-9c88c60a2a01)

![20240903_14h00m57s_grim](https://github.com/user-attachments/assets/9a218b57-d081-4ab4-a002-0301020b5194)

.

.

.

.

**FLASHBANG WARNING!**

.

.

.

.

.

.

.

.

.

.

.

.

.

.

.

.

.

.

.

![20240903_13h59m05s_grim](https://github.com/user-attachments/assets/6b58aea7-39fd-46da-ac77-1ebc0a2a91bb)

![20240903_13h59m49s_grim](https://github.com/user-attachments/assets/99d50d5d-21b5-480a-b702-30ddc1d63403)

![20240903_14h01m41s_grim](https://github.com/user-attachments/assets/e3d06789-56ed-4ee4-9c88-7653351be7ac)



