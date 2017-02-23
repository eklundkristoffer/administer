### Table of contents

* [Installation](#installation)</br>
* [Users](#users)
    * [Limits](#limits)
    * [User Model](#user-model)
    * [Authentication](#authentication)
* [Models](#models)
    * [Editable Models](#editable-models)
* [Commands](#commands)
    * [Add User Role](#add-user-role)
    * [Delete User Role](#delete-user-role)

###Installation 

require the project using Composer:
```
composer require eklundkristoffer/administer
```

or manually update your require block and run `composer update`
```
{
    "require": {
        "eklundkristoffer/administer": "~0.1"
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

### Models

##### Editable Models

By adding a model to the `models` array in `config/administer.php` Administer will then automatically let you edit the model records from the web. You can with ease define which fields that can be edited, and which fields that should be shown in the presentation list. 

```php
'models' => [
    App\User::class => [
        'present_fields' => ['username', 'email'],
        'editable_fields' => ['username', 'email']
    ]
],
```

### Commands

##### Add User Role
```
php artisan administer:user:addrole {user_id} {roles*}
```
##### Delete User Role
```
php artisan administer:user:deleterole {user_id} {roles*}
```
