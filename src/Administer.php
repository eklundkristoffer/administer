<?php

namespace Administer;

class Administer
{
    /**
     * Get the user model.
     *
     * @return string
     */
    public function getUserModel()
    {
        return resolve('auth.driver')->getProvider()->getModel();
    }

    /**
     * Create a new User instance.
     *
     * @return User
     */
    public function user()
    {
        return app($this->getUserModel());
    }
}