## Oil Change Challenge

How To Run

Step 1. Clone the Repository
```bash
git clone https://github.com/maxkcl/oil-change.git
```

Step 2. Install dependencies
```bash
composer install

npm install
```

Step 3. Initialize database
```bash
php artisan migrate
```
In case you are prompted to confirm your decision and create a SQLite database, say yes.

Step 4. Run application
```bash
composer run dev
```