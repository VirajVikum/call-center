<?php

namespace Database\Seeders;

use App\Models\ac_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ac_user::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=> bcrypt('12345678'),
            'user_name'=>'VRX',
            'phone'=>'119',
            'nic'=>'1545',
            'gender'=>'male',	
            'address'=>'Russia',	
            'user_type_id'=>'1',
            'extension'=>'1',
            'status'=>'0',
            'del_status'=>'0',

           
        
        ]);
    }
}
