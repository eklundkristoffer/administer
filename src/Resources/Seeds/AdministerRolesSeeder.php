<?php

namespace Administer\Resources\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministerRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect([
            [
                'slug'  => 'administer',
                'title' => 'Administer',
                'value' => 1,
            ],

            [
                'slug'  => 'model.view',
                'title' => 'View Model',
                'value' => 2
            ],

            [
                'slug'  => 'model.edit',
                'title' => 'Edit Model',
                'value' => 4
            ],
        ]);

        $roles->each(function ($role, $key) {
            DB::table(config('administer.table_prefix').'roles')->insert($role);
        });
    }
}