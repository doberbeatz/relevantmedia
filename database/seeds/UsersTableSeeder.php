<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => password_hash('123456', PASSWORD_DEFAULT),
                'created_at' => Carbon::now()
            ]
        ]);
        $user = User::where('email', 'admin@example.com')->first();
        $user->setRole('admin');
    }
}
