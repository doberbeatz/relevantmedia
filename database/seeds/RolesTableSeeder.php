<?php

use App\RelevantMedia\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role_id' => Role::ADMIN,
                'name' => 'Admin'
            ],
            [
                'role_id' => Role::EMPLOYER,
                'name' => 'Employer'
            ],
        ]);
    }
}