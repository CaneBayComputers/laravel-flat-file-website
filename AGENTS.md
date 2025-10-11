## 🧠 AI Agent Onboarding Protocol

### Purpose

This section defines how any AI agent (e.g., Codex, Cursor, Aider, or GPT CLI) should **initialize** and **learn** the project structure before performing any edits, analysis, or code generation.

---

### Step 1: Context Acquisition

**Read and summarize the following files** in the given order to become acquainted with the project’s architecture, dependencies, and conventions:

1. `README.md` – overall purpose, setup, and deployment notes
2. `composer.json` – PHP dependencies and autoloading configuration
3. `.env` – environment variables and active service settings
4. `app/helpers.php` – global helper functions and environment logic

After reading, summarize each file’s purpose in a few sentences to confirm comprehension before proceeding.

---

### Step 2: Project Overview

**About**

* Flat-file content system
* Built-in form processing

**Tech Stack**

* PHP 8.3
* Laravel 12
* Bootstrap 5.3

**Services**

* **Database:** MariaDB
* **Cache:** Redis (default), Memcached optional
* **Queue:** Redis
* **Session driver:** Redis
* **Mail:** Mailhog
* **File storage:** Local
* **Broadcast:** Log driver
* **AWS S3:** Not used in dev (helpers switch assets between AWS and `/images` folder)

---

### Step 3: Project Conventions

* Blade templates in `resources/views/content` correspond to URL slugs.
* Routes are defined in `routes/web.php`.
* Middleware `VerifyContentAccess` checks the Redis page registry.
* Controller: `PageController` renders approved views.
* Refresh Redis content list:

  ```bash
  php artisan app:update-content-list
  ```

  or

  ```bash
  podium art app:update-content-list
  ```

  Run this whenever content files are added, removed, or modified.
* Use `placehold.co` for image placeholders.
* All links must use root-scoped anchors (e.g., `/` or `/#contact`) for navigation consistency.
* Custom helpers live in `app/helpers.php` and include:

  * `is_dev()` / `is_prod()` – environment checks
  * `cdn()`, `scripts()`, `styles()` – asset path generators
  * `_c()` – shorthand config access
  * `_l()` – structured logging with type handling

**Code Style**

* Blade filenames: lowercase-with-dashes
* Variables: `snake_case`
* PHP: PSR-12 / Laravel defaults

  * 4-space indent
  * PascalCase classes
  * camelCase methods
* **if / else blocks:** opening brace on new line, closing brace aligned, extra blank line after block
* **try / catch blocks:** braces on new lines, catch indented within block
* Maintain generous blank lines for readability; preserve spacing in edits.

---

## 🔁 Agent Behavior

When first initializing or joining the project, the AI agent must:

1. Read and summarize the files listed above.
2. Confirm understanding of the project structure and conventions.
3. Only then proceed to perform edits, explanations, or refactors.

---

### ✅ Example initialization prompt

When you start a new session or resume an unfamiliar project, run:

```
Follow the AI Agent Onboarding Protocol in AGENTS.md.
Read and summarize each file listed under Step 1 before continuing.
```

Once it finishes summarizing, follow up with:

```
Now that you're acquainted, confirm adherence to the coding conventions
in the 'Project Conventions' section and await my next instruction.
```
