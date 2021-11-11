### subscriptions api

### Requirements
 - PHP 7.3+
 - MySQL
 - Composer

### Installation
```
    composer install
    cp .env.example .env
```
### Update .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=subscriptions
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=database

MAIL_DRIVER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_USERNAME=apikey
MAIL_PASSWORD=xxxxxxxxxxxxxxxxxxx
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=test@test.com
MAIL_FROM_NAME="Website Name"
```

### run queue table
```
php artisan queue:table
```

### run migrations
```
php artisan migrate
```

### seed db
```
php artisan db:seed
```

### artisan command to send post to subscribers
```
php artisan email:subscribers --post_id={postId} --website_id={websiteId}
```


### run server
```
php artisan serve
```

### api docs
https://documenter.getpostman.com/view/6347827/UVC6jSVS

