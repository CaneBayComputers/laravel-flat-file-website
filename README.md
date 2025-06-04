# 🗂️ Flat File CMS Setup (Laravel Style)

This project uses a **flat-file CMS system** built directly on Laravel 12, with Redis-backed caching for fast page resolution and validation.

---

### 📚 How it Works

* Blade files live in `resources/views/content/`
* A custom Artisan command builds a list of available pages and saves it to Redis
* Middleware (`VerifyContentAccess`) validates every request to ensure only pre-validated pages are accessible
* No database needed — **pure flat-file content**

---

### 🚀 Installation Steps

> **Note**: This project is designed to be used with the [cbc-development](https://github.com/CaneBayComputers/cbc-development) environment.

1. **Clone This Project Using cbc-development**

   ```bash
   cd ~/cbc-development/scripts
   ./clone_project.sh https://github.com/CaneBayComputers/cbc-laravel-website
   ```

That’s it! The environment setup, Docker services, and Redis configuration are handled automatically by `cbc-development`.

---

### ✅ Example Request Flow

* Request: `/contact`
* Resolves to: `resources/views/content/contact.blade.php`
* Validated by: Redis pre-built list
* Served securely: Only existing pages are accessible, all others 404

---

### 🛡️ Security

* Only alphanumeric, slash, and dash URLs allowed
* No periods, underscores, query strings
* Middleware ensures no invalid paths reach the page handler
* Redis-backed lookup for fast validation without DB hits

---

### 💬 Notes

* After adding or removing `.blade.php` files in `resources/views/content/`, re-run:

  ```bash
  ./art-docker app:update-content-list
  ```
* Use `art-docker` to run any Laravel Artisan commands inside the Docker container.

---