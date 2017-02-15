<?php

namespace Administer\Commands;

use Illuminate\Console\Command;
use Facades\Administer\Administer;

class AddRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administer:user:addrole {user_id} {role*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add role to user';

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

        $role = $this->argument('role');
        $roles = collect(config('administer.roles', []));
        $sum = ($superuser = in_array('superuser', $role)) ? $roles->sum() : $roles->only($role)->sum();

        $user->administer_role = ($superuser) ? $sum : $user->administer_role + $sum;
        $user->save();

        return $this->info('User role have been updated');
    }
}