# Laracasts Playground

A collection of personal notes, exercises, and mini-projects inspired by [Laracasts](https://laracasts.com/). This repository is intended for learning and experimenting with PHP, databases, and web development concepts.

## Features

- Simple PHP routing
- MVC-style folder structure
- Example controllers and views
- Database connection and queries
- Tailwind CSS integration

## Getting Started

### Prerequisites

- PHP 8.x or newer
- Composer (optional, if you add dependencies)
- MySQL or compatible database (for database features)

### Installation

1. Clone the repository:

```bash
git clone https://github.com/alessandro-giuzio/laracasts-playground.git
cd laracasts-playground/php
```

2. Set up your database and update `config.php` with your credentials.

3. Start the PHP development server:

```bash
php -S localhost:8000
```

4. Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Project Structure

- `php/` - Main application code
  - `controllers/` - Route controllers
  - `views/` - HTML/PHP views
  - `views/partials/` - Shared view components
  - `styles.css` - Custom styles
  - `Database.php` - Database connection class
  - `functions.php` - Helper functions
  - `router.php` - Simple router

## Usage

- Edit or add controllers in `php/controllers/`
- Add new views in `php/views/`
- Update routes in `php/router.php`
- Customize styles in `php/styles.css`

## License

This project is for personal learning and is not intended for production use.
