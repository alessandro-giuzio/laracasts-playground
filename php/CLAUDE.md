# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Commands

```bash
# Install dependencies
composer install

# Run all tests
./vendor/bin/pest

# Run a single test file
./vendor/bin/pest tests/Feature/ExampleTest.php

# Lint / format code
./vendor/bin/pint

# Start local dev server (serves from public/)
php -S localhost:8000 -t public
```

## Architecture

This is a from-scratch PHP MVC framework built as a Laracasts learning project. There is no Laravel — just vanilla PHP with a few Composer dependencies (Pest for testing, Pint for formatting, `illuminate/collections`).

### Request Lifecycle

`public/index.php` is the single entry point. It:
1. Starts the session and loads autoloader, `Core/functions.php`, `bootstrap.php`
2. Instantiates `Core\Router` and loads `routes.php`
3. Dispatches the request via `$router->route($uri, $method)`
4. Catches `ValidationException` → flashes errors/old input to session → redirects back

HTTP method spoofing: PATCH and DELETE are sent via a hidden `_method` POST field; `public/index.php` reads `$_POST['_method']` before falling back to `$_SERVER['REQUEST_METHOD']`.

### Core Components (`core/`)

| Class | Role |
|---|---|
| `Router` | Stores routes as arrays; matches URI+method; resolves middleware; `require`s the matched controller file |
| `App` | Static facade around the `Container` singleton |
| `Container` | Simple IoC — `bind($key, $resolver)` / `resolve($key)` |
| `Database` | PDO wrapper; fluent `query()->get()/find()/findOrFail()` |
| `Session` | Static helpers for `$_SESSION`, including flash data (`_flash` key) |
| `Validator` | Static `string()` and `email()` validation methods |
| `ValidationException` | Thrown by controllers; carries `$errors` and `$old` arrays |
| `Authenticator` | Handles login/logout logic |
| `Response` | HTTP status code constants |
| `Middleware/Middleware` | Resolves `'auth'`/`'guest'` keys to `Authenticated`/`Guest` classes |

### Routing

Routes are defined in `routes.php` using `$router->get/post/delete/patch($uri, $controller)`. Controllers are file paths relative to `Http/controllers/`. Middleware is chained with `->only('auth')` or `->only('guest')`.

### Controllers

Plain PHP files in `Http/controllers/` (not classes). They have direct access to `$_GET`/`$_POST` superglobals and all helpers from `core/functions.php`: `view()`, `redirect()`, `abort()`, `authorize()`, `base_path()`, `old()`, `dd()`.

### Views

PHP files in `views/`, rendered via the `view($path, $attributes)` helper which calls `extract()` to make attributes available as local variables. Partials live in `views/partials/`.

### Database

Configured in `config.php` (host, port, dbname, charset). Credentials are hardcoded in `Database::__construct()`. The `Database` instance is bound to the container in `bootstrap.php` and resolved with `App::resolve('Core\Database')`.

### PSR-4 Namespaces

- `Core\` → `core/` (note: directory on disk is lowercase `core`, but autoloader maps `Core\`)
- `Http\` → `Http/`
