<p align="center"><img src="public/logo.svg" width="160" alt="Unfiltered Logo"></p>

# Unfiltered

Unfiltered is an **anonymous** inbox for the internet, where people share their thoughts, secrets, rants, regrets, and reviews, no sign-up required. Just email your thoughts to [share@unfiltered.frikishaan.com](mailto:share@unfiltered.frikishaan.com) and it will be published to the wall.

This app is created for a hackathon on [Dev](https://dev.to/challenges/postmark).

## Tech Stack

- [Laravel](https://laravel.com/)
- [Tailwind CSS](https://tailwindcss.com/)
- [Inertia.js](https://inertiajs.com/)
- [Vue.js](https://vuejs.org/)
- [Postmark](https://postmarkapp.com/)

## Installation

Follow the below steps to install the app -

### Clone repository

```bash
git clone https://github.com/frikishaan/unfiltered.git
```

### Install dependencies

```bash
composer install
npm install
```

### Migrate database

```bash
php artisan migrate
```

Optionally, you can run the following command to seed the database with test data:

```bash
php artisan db:seed
```

### Copy environment variables

```bash
cp .env.example .env
``` 

For security, I have used Basic Auth with Postmark webhook. Replace the `POSTMARK_WEBHOOK_USERNAME` and `POSTMARK_WEBHOOK_PASSWORD` with your own values.

### Add the webhook in Postmark

Add the webhook in Postmark to send inbound email to `https://username:password@<your-domain>/webhooks/inbound`.

Replace the username and password with the values from the `.env` file.

### Generate application key

```bash
php artisan key:generate
```

## Run server

```bash
composer run dev
```

## License

Unfiltered is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
