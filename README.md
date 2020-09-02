# Bulletin

Bulletin is a message board system that allows users to register, leave messages and see and comment messages.

It was built as an exercise to learn more about Laravel.

This project is written in PHP and uses the following tech stack:
- [Laravel](https://laravel.com) to create and manage the app's scaffolding
- MySQL for the database
- [Blade](https://laravel.com/docs/7.x/blade) as the templating engine

## Set Up Instructions

Clone the project and install its dependencies:

```bash
git clone git@github.com:arturjzapater/message-board.git
cd message-board
compose install
```

Install and compile the UI assets:

```bash
npm install
npm run dev
```

Make a copy of [`.env.example`](.env.example), rename it as `.env` and generate an app key:

```bash
cp -a .env.example .env
php artisan key:generate
```

Configure the environment variables. You will need to update `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` to match your database configuration.

Run the database's migrations:

```bash
php artisan migrate
```

Finally, you can seed the database with test data, if you want:

```
php artisan db:seed
```
