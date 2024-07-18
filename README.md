# PassAudit

<p align="center">
  <a href="https://github.com/kettasoft/PassAudit/releases">
    <img src="https://img.shields.io/github/release/kettasoft/PassAudit.svg?style=flat-square" alt="Latest Version">
  </a>
  <a href="https://travis-ci.org/kettasoft/PassAudit">
    <img src="https://img.shields.io/travis/kettasoft/PassAudit/master.svg?style=flat-square" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/kettasoft/PassAudit">
    <img src="https://img.shields.io/packagist/dt/kettasoft/PassAudit.svg?style=flat-square" alt="Total Downloads">
  </a>
</p>

PassAudit is a powerful and efficient Laravel package designed to enhance the security of user passwords in your application. This package provides a comprehensive solution to prevent users from reusing their previous passwords, thereby mitigating the risk of unauthorized access.

## Installation

You can install the package via Composer:

```bash
composer require kettasoft/pass-audit
```

## Configuration

<!-- ### Steps to Configure -->

1. **Register Service Provider**

- Add the service provider to the config/app.php file in the providers array:

```php
'providers' => [
    Kettasoft\PassAudit\PassAuditServiceProvider::class,
    ...
],
```

**Publish Configuration**

- Publish the package configuration file:

```dash
php artisan vendor:publish --provider="Kettasoft\PassAudit\PassAuditServiceProvider" --tag="config"
```

- This will create a passaudit.php file in your config directory where you can customize the settings.

**Publish Migration**

- Publish the migration file:

```dash
php artisan vendor:publish --provider="Kettasoft\PassAudit\PassAuditServiceProvider" --tag="migrations"
```

Then, run the migration:

```dash
php artisan migrate
```

## Usage

**Use Trait in User Model**

Add the `PassAudit` trait to your `User` model:

```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Kettasoft\PassAudit\PassAudit;

class User extends Authenticatable
{
    use PassAudit;

    //...
}
```

**Implement Interface to User Model**

- Ensure your `User` model implements the `HasPassAuditChecker`:

```php
namespace App\Models;

use Kettasoft\PassAudit\Contracts\HasPassAuditChecker;

class User extends Authenticatable implements HasPassAuditChecker
{
    //
}
```

**Use Rule Validation in Request**

- You can use the `PassAuditRule` in your request validation to prevent users from reusing their previous passwords:

```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Kettasoft\PassAudit\Rules\PassAuditRule;

class UpdatePasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => ['required', 'string', 'min:8', new PassAuditRule($this->user())],
        ];
    }
}
```

### Customization

You can customize the behavior of the package by modifying the `passaudit.php` configuration file. Options include:

- The number of previous passwords to keep track of
- The hashing algorithm to use

### Contributing

Thank you for considering contributing to PassAudit! Please read the contributing guide before making a pull request.

### License

PassAudit is open-sourced software licensed under the MIT license.
