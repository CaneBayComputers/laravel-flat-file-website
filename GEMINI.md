# GEMINI Project Analysis

## Project Overview

This project is a flat-file Content Management System (CMS) built on the Laravel 12 framework. It uses Blade files for content and leverages Redis for caching and validating page access. The system is designed to be simple and secure, with no database required for content management.

**Key Technologies:**

*   **Backend:** PHP 8.2, Laravel 12
*   **Frontend:** Blade templates, Vite for asset bundling
*   **Caching:** Redis
*   **Package Manager:** Composer

**Architecture:**

*   Content is stored as `.blade.php` files in the `resources/views/content` directory.
*   An Artisan command (`app:update-content-list`) scans the content directory and stores a list of valid pages in Redis.
*   Middleware (`VerifyContentAccess`) intercepts incoming requests and checks them against the Redis-backed list of pages, returning a 404 error for any invalid or non-existent pages.
*   Routes in `routes/web.php` direct all page requests to the `PageController`, which dynamically renders the appropriate Blade view.

## Building and Running

### Development Environment

To run the project in a local development environment, use the following command:

```bash
composer run dev
```

This command concurrently starts the following services:

*   PHP development server
*   Laravel Queue worker
*   Laravel Pail for log tailing
*   Vite for frontend asset development

### Testing

To run the project's test suite, use the following command:

```bash
composer run test
```

This command clears the configuration cache and then runs the PHPUnit tests.

### Updating Content

After adding or removing content files (Blade templates) in `resources/views/content`, you must update the Redis content list by running:

```bash
podium art app:update-content-list
```

## Development Conventions

*   **Content:** All website content is created as Blade files in the `resources/views/content` directory. Subdirectories can be used to organize content.
*   **Routing:** The routing is designed to be hands-off. All valid pages in the content directory are automatically served.
*   **Security:** The `VerifyContentAccess` middleware enforces that only pages from the pre-approved Redis list can be accessed. URL slugs can only contain alphanumeric characters, slashes, and dashes.
*   **Dependencies:** PHP dependencies are managed with Composer.
