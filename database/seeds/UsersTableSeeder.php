<?php

use App\RelevantMedia\Models\Role;
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
                'role_id' => Role::ADMIN,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
