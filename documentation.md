# Simplex Framework Documentation

## Table of Contents
1. [Getting Started](#getting-started)
2. [Directory Structure](#directory-structure)
3. [Routing](#routing)
4. [Controllers](#controllers)
5. [Models & ORM](#models-and-orm)
6. [Views](#views)
7. [Middleware](#middleware)
8. [Configuration](#configuration)
9. [Database](#database)
10. [Logging](#logging)

## Getting Started

After installing the framework using:
```bash
composer create-project chiheb/simplex-framework your-project-name
```

Configure your environment by copying the example file:
```bash
cp .env.example .env
```

## Controllers

Create controllers in `app/Controllers`:

```php
namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return view('home', ['title' => 'Welcome']);
    }
}
```

## Models and ORM

Using CakePHP ORM:

```php
namespace App\Models;

use Cake\ORM\Entity;

class User extends Entity
{
    protected array $_accessible = [
        'name' => true,
        'email' => true,
        'password' => true
    ];
}
```

## Views

Create views in `app/Views`:

```php
<!-- app/Views/home.php -->
<h1><?= $title ?></h1>
```
## Configuration

Environment configuration in `.env`:

```env
APP_NAME=SimplexApp
APP_ENV=local
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=simplex
DB_USERNAME=root
DB_PASSWORD=
```

## Database

Configure your database in `config/database.php`:

```php
return [
    'default' => env('DB_CONNECTION', 'mysql'),
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST'),
            'database' => env('DB_DATABASE'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
        ]
    ]
];
```

## Logging

Using Monolog for logging:

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('app');
$log->pushHandler(new StreamHandler('storage/logs/app.log'));
$log->info('This is a log message');
```
