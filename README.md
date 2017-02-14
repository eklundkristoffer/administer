### Table of contents

[Installation](#installation)</br>
[Users](#users)

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

#### Limits
* Only eloquent driver is supported.
* Multiple guards is not supported.

#### User model

Your user model should also be extending Administers own user model:

```php
namespace App\User;

use Administer\Models\User as Administer;

class User extends Administer
{
    //
}
```
