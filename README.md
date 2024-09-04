# Teruza Project

Thanks for considering me for the position!

Below are some setup instructions, in case you want to setup the project yourself,
a demo site that might or might not be up at the time you're reading this,
else some screenshots that should give you the gist of things.

There are also a couple of tests included.

Please note, I got stuck with the CSRF and XSS requirements. It's probably something
simple I'm overlooking, but I've commented out those implementations for now.

## Demo site

I spun up a demo site in case you prefer not to install anything. I believe they only
last for one hour, so if it is down by the time you're reading this and you would like to
see it, just drop me a message.

http://teruza-rqpt.laravel-sail.site:8080/

Make sure your scheme is http, _**not**_ https.

## Local Setup

1. Run this one-liner

```bash
git clone https://github.com/rqpt/example-app \
&& cd example-app \
&& cp .env.example .env \
&& touch ./database/database.sqlite \
&& mkdir -p ./tests/Feature \
&& composer install --no-dev --no-interaction --optimize-autoloader \
&& npm install \
&& npm run build \
&& php artisan migrate \
&& php artisan key:generate \
&& php artisan optimize \
&& php artisan serve
```
2. (Optional) Run `./vendor/bin/pest` to run the included unit tests.

3. Navigate to http://127.0.0.1:8000

## Screenshots

![20240903_13h58m18s_grim](https://github.com/user-attachments/assets/5c5c7896-ddff-4aa5-aff5-173e9dc4c1bc)

![20240903_14h00m25s_grim](https://github.com/user-attachments/assets/b60f49a9-7d9a-4dbf-931e-9c88c60a2a01)

![20240903_14h00m57s_grim](https://github.com/user-attachments/assets/9a218b57-d081-4ab4-a002-0301020b5194)

![20240903_14h30m13s_grim](https://github.com/user-attachments/assets/d1402fce-6176-4a6b-ba64-5f655d32f63b)

![20240903_14h30m52s_grim](https://github.com/user-attachments/assets/0b4bdc4d-9e90-41d5-9185-60a9bddc3d5c)

.

.

.

.

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

**FLASHBANG WARNING!**

.

.

.

.

![20240903_13h59m05s_grim](https://github.com/user-attachments/assets/6b58aea7-39fd-46da-ac77-1ebc0a2a91bb)

![20240903_13h59m49s_grim](https://github.com/user-attachments/assets/99d50d5d-21b5-480a-b702-30ddc1d63403)

![20240903_14h01m41s_grim](https://github.com/user-attachments/assets/e3d06789-56ed-4ee4-9c88-7653351be7ac)

![20240903_14h31m28s_grim](https://github.com/user-attachments/assets/ff9ae092-bac0-40ec-874f-aebee8fd4635)

![20240903_14h32m03s_grim](https://github.com/user-attachments/assets/57678fdc-1039-4e0b-9a5d-73143f4f04ec)
