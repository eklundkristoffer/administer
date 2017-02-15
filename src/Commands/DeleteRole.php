<?php

namespace Administer\Commands;

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
        $role = $this->argument('role');
        $roles = collect(config('administer.roles', []));

        if (in_array('superuser', $role)) {
            $user->administer_role = 0;
        } else {
            foreach ($role as $r) {
                if (! $user->can($r)) {
                    continue;
                }

                $user->administer_role = $user->administer_role - $roles->get($r);
            }
        }

        $user->save();

        return $this->info('User role have been updated');
    }
}