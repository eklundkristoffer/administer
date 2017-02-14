<?php

namespace Administer\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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

    /**
     * Get the field used as username during authentication.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the field used as password during authentication.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}