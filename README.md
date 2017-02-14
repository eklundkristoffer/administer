### Table of contents

* [Installation](#installation)</br>
* [Users](#users)
    * [Limits](#limits)
    * [User Model](#user-model)
    * [Authentication](#authentication)
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

#### Authentication
If you want a administer to login using email for example, you will have to update `$username` property in your user model. Administer is using `username` and `password` fields on default.

```php
namespace App\User;

use Administer\Models\User as Administer;

class User extends Administer
{
    /**
    * Field to be used as username during authentication.
    *
    * @var string
    */
   protected $username = 'username';

   /**
    * Field to be used as password during authentication.
    *
    * @var string
    */
   protected $password = 'password';
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
