<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUserChurch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:update_user_church';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update user church id';

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
        $users = User::chunk(200, function($users){
            foreach ($users as $user) {
                $user->church_id = 1;
                $user->save();
            }
        });
    }
}
