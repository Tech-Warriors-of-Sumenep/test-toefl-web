# Toefl App Backend

## How To Use

To use this App is very simple, you must run a simple syntax in terminal or command prompt.

### Clone The Project

```
git clone https://github.com/Tech-Warriors-of-Sumenep/test-toefl-web.git
```

or

```
git clone git@github.com:Tech-Warriors-of-Sumenep/test-toefl-web.git
```

### Install The Project With Composer

```
composer install
```

### Copy ".env.example" file to ".env"

```
cp .env.example .env
```

or you can copy the file in your File Manager.

### Generate App_Key

```
php artisan key:generate
```

### Symlink Storage For Store Public Files

```
php artisan storage:link
```

### Initiate The Database Migration

```
php artisan migrate
```

or You can make the seed with the following command <b>(RECOMMENDED IF YOU HAVE SEEDERS)</b> :

```
php artisan migrate --seed
```

> **NOTE : Make sure the web server and database are turned on before migration command**

### And Lastly, Run the server

```
php artisan serve --host 0.0.0.0
```
