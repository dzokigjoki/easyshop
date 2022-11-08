<?php

namespace EasyShop\Console\Commands;

use Illuminate\Console\Command;
use EasyShop\Models\User;
use EasyShop\Models\Role;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user for the application';

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
        $email = $this->ask('Enter user email address:');
        $password = $this->secret('Enter user password:');
        $roleName = $this->choice('Choose role:', ['user', 'admin']);


        $user =  new User();
        $user->email = $email;
        $user->password = \Hash::make($password);
        $user->confirmed = 1;
        $user->aktiven = 1;
        $user->confirmation_code =  md5(microtime().\Config::get('app.key'));
        $user->warehouse_id = 1;
        $user->save();


        if ($roleName !== 'user') {
            $role = Role::where('name', '=', $roleName)->first();

            if (is_null($role)) {
                $this->error('First run the seeds!');
            }
            $user->roles()->attach($role->id);
        }


        $this->info('The user is successfully created!');
    }
}
