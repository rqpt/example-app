# Teruza Project

Thanks for considering me for the position!

Below are some setup instructions, in case you want to setup the project yourself,
else there are some screenshots that should give you the gist of things.

Please note, I got stuck with the CSRF and XSS requirements. It's probably something
simple I'm overlooking, but I've commented out those implementations for now.

Also there isn't any handling in place for network issues with the API or invalid pairs
\- will need to revisit that later.

## Setup

1. Run this oneliner

```bash
git clone https://github.com/rqpt/example-app \
&& cd example-app \
&& cp .env.example .env \
&& touch ./database/database.sqlite \
&& composer install \
&& npm install \
&& php artisan migrate \
&& php artisan serve
```

2. Navigate to http://127.0.0.1:8000

## Screenshots

![20240902_23h08m16s_grim](https://github.com/user-attachments/assets/48f0b46b-11f1-4c6b-bdf4-636ff50c45c1)

![20240902_23h09m06s_grim](https://github.com/user-attachments/assets/72228e8a-e792-4229-89d3-d16d42ac2fa5)

![20240902_23h10m10s_grim](https://github.com/user-attachments/assets/c2400428-dbe2-4bb7-a873-162d8346e9d0)

![20240902_23h10m33s_grim](https://github.com/user-attachments/assets/67ef8624-3f6a-4cf8-b11e-6ccb07048757)

![20240902_23h09m40s_grim](https://github.com/user-attachments/assets/b57c8209-5b14-4a03-9597-3ae936d5c7f8)

![20240902_23h11m40s_grim](https://github.com/user-attachments/assets/3cfe45fa-cf47-4023-9dfe-964b96931456)
