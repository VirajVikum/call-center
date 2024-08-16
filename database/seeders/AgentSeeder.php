<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // Correct import for Role
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new user
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'user_name' => 'VRX',
            'phone' => '119',
            'nic' => '1545',
            'gender' => 'male',
            'address' => 'Russia',
            'user_type_id' => '1',
            'extension' => '1',
            'status' => '0',
            'del_status' => '0',
        ]);

        // Check if the admin role exists, if not, create it
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        
        Permission::firstOrCreate(['name' => 'create details']);
        Permission::firstOrCreate(['name' => 'edit details']);

        $adminRole->givePermissionTo([ 'create details','edit details']);

        // Assign the role to the user
        $user->assignRole($adminRole);
    }
}
