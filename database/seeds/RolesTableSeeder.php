<?php

use Illuminate\Database\Seeder;

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
            'id' => 1,
            'name' => 'super-admin',
            'display_name' => 'Admin Cocuiza',
            'description' => 'Test Super Admin',
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'manager',
            'display_name' => 'Director',
            'description' => 'Test Director'
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'teacher',
            'display_name' => 'Teacher',
            'description' => 'Test Teacher'
        ]);
        DB::table('roles')->insert([
            'id' => 4,
            'name' => 'representante',
            'display_name' => 'Representante',
            'description' => 'Test Representante'
        ]);
        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'student',
            'display_name' => 'Student',
            'description' => 'Test Student'
        ]);
    }
}
