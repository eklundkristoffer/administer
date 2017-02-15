<?php

namespace Administer\Commands;

use Illuminate\Console\Command;

class RemoveAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administer:admin:remove {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove a administer';

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
        $user = Administer::user()->findOrFail($this->argument('user'));
        $user->administer = 0;
        $user->save();

        $this->info("User have been removed as administer");
    }
}