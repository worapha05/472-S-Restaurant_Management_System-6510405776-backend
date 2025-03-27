# omnidine-backend

## Clone the project

```
git clone https://github.com/Professors001/omnidine-backend
cd omnidine-backend
```

```
git branch -a
```

```
git checkout develop
```

```
git flow init -d
```
## Edit .env file
```
cp .env.example .env
```

```
APP_TIMEZONE=Asia/Bangkok 
```

```
APP_LOCALE=th
APP_FALLBACK_LOCALE=th
APP_FAKER_LOCALE=th_TH
```

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=omnidine
DB_USERNAME={ in discord }
DB_PASSWORD={ in discord }
```

## Executing Composer Command
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs
```

```
sail up -d
sail artisan key:generate
sail artisan migrate:fresh --seed
```
## จากนั้นลองเข้าเว็บตามนี้

### http://localhost/

### http://localhost:8090/

