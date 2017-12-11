# Laravel-single-session

A plugin provide single session authentication for Laravel 5.

## Installing

```shell
$ composer require overtrue/laravel-single-session -vvv
```

## Usage

1. Register provider(if you disabled Laravel auto discovery)

```php
    'providers' => [
        Overtrue\LaravelSingleSession\SingleSessionServiceProvider::class
    ],
```

2. (Optional) Config the session:

```php
    // config/session.php
    // The storage for store the last session id.
    'last_session_storage' => 'cache', // cache(default)/database
    
    // The field name of last session id.
    'last_session_field' => 'last_session_id', 
    
    // The path of redirect when logout after session changed.
    'redirect_path' => '/',
```

3. it works.


### Events

If the session changed, the following event will be triggered: 

```phl
Overtrue\LaravelSingleSession\Events\SessionExpired
```

## License

MIT
