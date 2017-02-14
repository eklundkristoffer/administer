<?php

namespace Administer\Commands;

use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administer:admin:make {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make user a administer';

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
        $user = app(config('administer.user_model', App\User::class))->findOrFail($this->argument('user'));
        $user->administer = 1;
        $user->save();

        $this->info("User have been set to administer");
    }
}