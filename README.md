# Bulletin

Bulletin is a message board system that allows users to register, leave messages and see and comment messages.

It was built as an exercise to learn more about [Laravel](laravel.com).

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

Configure the environment variables. You will need to update `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` to match your database configuration.

Run the database's migrations:

```bash
php artisan migrate
```

Finally, you can seed the database with test data, if you want:

```
php artisan db:seed
```
