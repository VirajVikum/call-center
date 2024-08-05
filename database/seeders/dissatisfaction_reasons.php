<?php

namespace Database\Seeders;

use App\Models\call_dissatisfaction_reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dissatisfaction_reasons extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        call_dissatisfaction_reason::create([
            'campaign_id'=>1,
            'reasons'=>["FAKE REPAIR - INCORRECT CUSTOMER",
            "PRODUCT PERFORMANCE LOWER THAN EXPECTED",
            "CUSTOMER UNREACHABLE",
            "PENDING JOB",
            "REPAIR DELAYED",
            "CONTACT NUMBER BELONGS TO DEALER",
            "LACK OF COMPETENCY ON WORK , REPAIR DELAYED"]
        ]);
    
    }
}
