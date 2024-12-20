<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {firstname} {lastname}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to create user by supplying firstname and lastname';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $firstname = $this->argument('firstname');
        $lastname = $this->argument('lastname');

        $exists = true;
        do
        {
            $username = Str::lower($firstname.$lastname[0].rand(1,1000));
            $user = User::where('username',$username)->first();
            if (empty($user))
            {
                $exists = false;
            }
        }while($exists===true);


        $pass = Str::random(8);

        User::create([
            'username'=>$username,
            'password'=>$pass,
            'first_name'=>$firstname,
            'last_name'=>$lastname
        ]);

        echo "Your user was created successfully\n";
        echo "Your username is:".$username.",Your password is:".$pass;


    }
}
