# SDIT Lukmanalhakim - AI Assistant Instructions

## Project Overview
This is a Laravel-based school website for SDIT Lukmanalhakim with admin dashboard functionality. The project follows a structured MVC pattern with specific conventions for views, controllers, and models.

## Key Architecture Patterns

### View Structure
- Views are organized by feature in `resources/views/`
  - Admin views: `resources/views/admin/`
  - Public views: Direct under `resources/views/`
- Partial views follow pattern:
  ```
  resources/views/admin/{feature}/partials/{component}-form.blade.php
  ```
  Example: `admin/profil/sambutan-kepsek/partials/header-form.blade.php`

### Controller Organization
- Admin controllers in `App\Http\Controllers\Admin\`
- Public controllers in `App\Http\Controllers\`
- Controllers use Resource Controller pattern with standard CRUD methods
- Validation happens in controller methods using Laravel's validation

### Models & Database
- Models in `App\Models\`
- Follow Laravel Eloquent conventions
- Use accessor methods for computed properties (e.g. `getFotoKepsekUrlAttribute`)
- Migrations in `database/migrations/` with timestamp prefixes
- Default data provided through seeders in `database/seeders/`

## Common Patterns

### Form Structure
```blade
<form action="{{ route('admin.{feature}.update') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-section mb-4">
        <h5 class="mb-3"><i class="fas fa-icon me-2"></i>Section Title</h5>
        <!-- Form fields -->
    </div>
</form>
```

### Error Handling
- Use Laravel's `@error` directive with `$errors->first()`:
```blade
@error('field_name')
    <div class="invalid-feedback">{{ $errors->first('field_name') }}</div>
@enderror
```

### Asset Management
- Images stored in `public/assets/images/{feature}/`
- Default images in `public/assets/images/default/`
- Feature-specific CSS/JS in `public/assets/{feature}/`

## Development Workflow
1. Run migrations: `php artisan migrate`
2. Seed initial data: `php artisan db:seed`
3. Use Laravel's artisan commands for development:
   - Create controller: `php artisan make:controller Admin/FeatureController`
   - Create model: `php artisan make:model Feature -m`

## Important Integrations
- Bootstrap 5 for UI components
- Font Awesome for icons
- TinyMCE for rich text editing
- Laravel's built-in auth for admin authentication

## Testing
Tests are organized in `tests/`:
- Feature tests in `tests/Feature/`
- Unit tests in `tests/Unit/`
Run tests with: `php artisan test`
