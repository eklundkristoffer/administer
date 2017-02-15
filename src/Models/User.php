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
    protected $administerUsername = 'username';

    /**
     * Field to be used as password during authentication.
     *
     * @var string
     */
    protected $administerPassword = 'password';

    /**
     * Get the field used as username during authentication.
     *
     * @return string
     */
    public function administerUsername()
    {
        return $this->administerUsername;
    }

    /**
     * Get the field used as password during authentication.
     *
     * @return string
     */
    public function administerPassword()
    {
        return $this->administerPassword;
    }

    /**
     * Determine if user is authorized to given action.
     *
     * @param  string|array  $flags
     * @return boolean
     */
    public function haveRole($action)
    {
        foreach ((array) $action as $flag) {
            if (! ($this->administer_role & config('administer.roles', [])[$flag])) {
                return false;
            }
        }

        return true;
    }
}