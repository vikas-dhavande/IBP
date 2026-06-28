---
name: php-website-dev
description: "Apply this skill for PHP website development tasks. Triggers on requests involving PHP programming, frontend-backend integration, dynamic Blade templating, Vite bundling, Tailwind CSS v4 styling, form validation, controllers, and local environment setup."
---

# PHP Website Development

This skill provides guides and conventions for modern PHP web development, particularly in a Laravel environment with Vite and Tailwind CSS.

## 1. PHP Development Conventions
- **Strict Types**: Always place `declare(strict_types=1);` at the top of PHP files.
- **Typed Signatures**: Specify parameter and return types for all functions and methods.
- **Constructor Promotion**: Use PHP 8 constructor property promotion for dependency injection.
- **Modern Syntax**: Use `match` expressions, null-safe operators (`?->`), and arrow functions (`fn() => ...`) where appropriate.

## 2. Blade & Dynamic Frontends
- **Vite Integration**: Ensure scripts and styles are loaded via `@vite(['resources/css/app.css', 'resources/js/app.js'])`.
- **Blade Components**: Prefer reusable Blade components (e.g. `<x-button>`, `<x-layout>`) over `@include`. Use slots for custom layouts.
- **Attributes Merging**: Always use `$attributes->merge()` inside component templates to allow custom styling classes from parent templates.
- **CSRF & Security**: Include `@csrf` on all POST/PUT/DELETE forms. Use `{{ }}` for safe escaping and `{!! !!}` ONLY for verified safe HTML content.

## 3. Tailwind CSS v4 Styling
- **Utility Classes**: Use Tailwind CSS utility classes directly in Blade templates.
- **Responsive & State Design**: Use prefixes like `md:`, `lg:`, `hover:`, `focus:` for responsive and interactive states.
- **Clean Structure**: Group layouts using flexbox (`flex`) or grid (`grid`) structures with semantic spacing (e.g., `gap-4`, `space-y-2`).

## 4. Controllers & Routing
- **Resource Controllers**: Map resource routes (`Route::resource(...)` or `Route::apiResource(...)`) to resource controller methods (index, create, store, show, edit, update, destroy).
- **Form Requests**: Extract form validation rules into standalone Form Request classes (`php artisan make:request`) rather than validating inline.
- **Model Binding**: Use implicit Route Model Binding (e.g., `public function show(User $user)`) to automatically resolve models from URL parameters.
- **Clean Methods**: Keep controller methods under 10 lines. Outsource complex business logic to Action classes or Service classes.

## 5. Eloquent ORM & Database
- **Eager Loading**: Prevent N+1 queries by eager loading relations using `with()` or `load()`.
- **Safe Queries**: Avoid raw SQL queries. Use Eloquent builder methods.
- **Migrations & Seeders**: Create migrations using `php artisan make:migration`. Define constraints explicitly. Write seeders and factories for all models to enable easy test database setups.

## 6. Testing & Formatting
- **Feature Tests**: Focus on Feature tests for request/response flow, session states, and database assertions.
- **Laravel Pint**: Always format modified PHP code using `vendor/bin/pint --format agent` to maintain consistency.
