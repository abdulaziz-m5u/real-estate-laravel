# Real Estate Laravel

## Preview

![preview img](/preview.png)

### Download Project

```bash
  git clone https://github.com/abdulaziz-m5u/real-estate-laravel.git project-name
```

Go to the project directory

```bash
  cd project-name
```

-   Copy .env.example file to .env and edit database credentials there

```bash
    composer install
```

```bash
    php artisan key:generate
```

```bash
    php artisan artisan migrate:fresh --seed
```

```bash
    php artisan storage:link
```

#### Login

-   email = admin@example.com
-   password = 123
