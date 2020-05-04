## PSR-15 HTML minifier Middleware

### Install

```ssh
composer require reinvanoyen/middlewares-minifier
```

### Oak-framework specific installation

This package provides a Service Provider specifically for the Oak framework. This does NOT mean you can't use it 
with any other framework. As long as the framework respects PSR-15, this package can be used.

1) Register the Service provider

```php
<?php

$app->register([
    \ReinVanOyen\Middlewares\HtmlMinifier\HtmlMinifierServiceProvider::class,
```

2) Register the middleware

```php
<?php

$router->middleware('default', [
    \ReinVanOyen\Middlewares\HtmlMinifier\HtmlMinifierMiddleware::class,
]);
```

3) Bind the middleware group to a route

```php
<?php

$router->get('(?<slug>.*)', PagesController::class, 'view')
    ->middleware(['default',])
;
```