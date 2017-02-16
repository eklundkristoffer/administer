<?php

namespace Administer\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Create a new Eloquent model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('administer.table_prefix', 'administer_').'roles');
    }
}
