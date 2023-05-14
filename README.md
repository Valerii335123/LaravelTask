# Встановлення проекта

```bash
cp .env.example .env
```

Підгружаєм вендори через докер однією командою

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Далі почергово виконуєм команди

```bash
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

```bash
sail up -d
sail composer install
sail artisan key:generate
sail artisan migrate --seed

```

IDE-HELPER

```bash
sail artisan ide-helper:generate
sail artisan ide-helper:models
```