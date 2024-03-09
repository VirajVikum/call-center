<?php

namespace Database\Seeders;

use App\Models\ac_user_types;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    ac_user_types::create(['title' => 'Super Admin']);
    ac_user_types::create(['title' => 'Admin']);
    ac_user_types::create(['title' => 'Supervisor']);
    ac_user_types::create(['title' => 'Agent']);
    ac_user_types::create(['title' => 'Outlet Supervisor']);
    ac_user_types::create(['title' => 'Outlet User']);
    ac_user_types::create(['title' => 'Client Admin']);
    ac_user_types::create(['title' => 'Client Report User']);
}
}
