<?php

namespace Administer\Commands;

use Administer\Models\Role;
use Illuminate\Console\Command;
use Facades\Administer\Administer;

class DeleteRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administer:user:deleterole {user_id} {role*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete role from user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = Administer::user()->findOrFail($this->argument('user_id'));

        $deleteroles = $this->argument('role');
        $roles = Role::get();

        $filtered = $roles->filter(function ($role, $key) use ($deleteroles, $user) {
            return (! $user->can($role->slug)) ? null : in_array($role->slug, $deleteroles);
        });

        $sum = ($superuser = in_array('superuser', $deleteroles)) ? 0 : $filtered->pluck('value')->sum();
        $user->administer_role = ($superuser) ? $sum : $user->administer_role - $sum;
        $user->save();

        return $this->info('User role have been updated');
    }
}