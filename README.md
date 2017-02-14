### Table of contents

* [Installation](#installation)</br>
* [Users](#users)
* [Commands](#commands)
    * [Make Administer](#make-administer)
    * [Delete Administer](#delete-administer)

###Installation 

require the project using Composer:
```
composer require administer/administer --dev
```

or manually update your require block and run `composer update`
```
{
    "require": {
        "administer/administer": "@dev"
    }
}
```

### Users

##### Limits
* Only eloquent driver is supported.
* Multiple guards is not supported.

##### User model

Your user model should also be extending Administers own user model:

```php
namespace App\User;

use Administer\Models\User as Administer;

class User extends Administer
{
    //
}
```

### Commands

##### Make Administer
```
php artisan administer:admin:make {user_id}
```
##### Delete Administer
```
php artisan administer:admin:delete {user_id}
```
