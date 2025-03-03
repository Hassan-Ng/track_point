# TrackPoint - POS Software for Garments Companies

TrackPoint is a powerful and user-friendly **Point of Sale (POS) software** designed specifically for garments businesses. It helps streamline sales, inventory, and customer management, making transactions seamless and efficient.

## Features

- Easy-to-use POS system for garments businesses
- SQLite database for lightweight and fast storage
- User authentication with admin access
- Inventory and sales tracking

## Installation Guide

### Step 1: Install Laravel and Composer

Ensure you have the correct Laravel and Composer versions installed on your system. You can install them using the following commands:

```sh
composer global require "laravel/installer"
```

For Composer, download it from [getcomposer.org](https://getcomposer.org/download/).

### Step 2: Install SQLite3

TrackPoint uses **SQLite** as its database. Download and install SQLite3 from:

- Windows: [https://www.sqlite.org/download.html](https://www.sqlite.org/download.html)
- Linux: Install via package manager, e.g.,
  ```sh
  sudo apt install sqlite3
  ```
- macOS: Install via Homebrew,
  ```sh
  brew install sqlite
  ```

### Step 3: Clone the Repository and Install Dependencies

```sh
git clone https://github.com/yourusername/trackpoint.git
cd trackpoint
composer install
```

### Step 4: Configure the Environment

Copy the `.env.example` file and update the necessary configurations:

```sh
cp .env.example .env
php artisan key:generate
```

Make sure your database connection in `.env` is set to:

```
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

### Step 5: Run Migrations and Seed the Database

```sh
php artisan migrate --seed
```

### Step 6: Start the Application

```sh
php artisan serve
```

Now, open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

## Default Login Credentials

- **Username:** `admin`
- **Password:** `admin`

## Contributing

If you’d like to contribute to TrackPoint, feel free to fork the repository and submit a pull request!

## Contact

For support or inquiries, feel free to reach out to **Hassan**:

- **GitHub:** [hassan-itear](https://github.com/hassan-itear)
- **LinkedIn:** [hassan-ng](https://www.linkedin.com/in/hassan-ng/)
- **Instagram:** [i.tear_](https://www.instagram.com/i.tear_)
- **Email:** [hng39044@gmail.com](mailto:hng39044@gmail.com)
