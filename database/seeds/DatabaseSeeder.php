<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->user_id_card = "123456789";
        $user->name = "Mister User";
        $user->email = "user@gmail.com";
        $user->password = Hash::make('password');
        $user->save();

        $staff = new App\Staff;
        $staff->staff_id_card = "987654321";
        $staff->name = "Mister Staff";
        $staff->email = "staff@gmail.com";
        $staff->password = Hash::make('password');
        $staff->save();
    }
}
