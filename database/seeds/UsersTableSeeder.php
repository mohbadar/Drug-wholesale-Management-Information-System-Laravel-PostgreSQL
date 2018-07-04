<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create user
        $user= new User;
        $user->name = "Hashimi";
        $user->email = "hashimi@gmail.com";
        $user->password = bcrypt('123456');
        $user->photo= "/assets/images/user.png";
        $user->save();
    }
}
