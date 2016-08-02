<?php

use App\RelevantMedia\Models\Role;
use Illuminate\Database\Seeder;
use DB;

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
            ['key' => 'admin', 'name' => 'Admin'],
            ['key' => 'employer', 'name' => 'Employer'],
        ]);
    }
}
