<?php

namespace Database\Seeders;

use App\Models\call_satisfaction_reason;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class satisfaction_reasons extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        call_satisfaction_reason::create([
            'campaign_id'=>1,
            'reasons'=>["TIMELY COMPLETED JOB",
"GREATE ATTITUDE/SERVICE",
"INSTRUCTIONS FOR USE/ EXPLAIN THE CAUSE OF DEFECT",
"COMPETENT ON WORK",
"ATTENDED TO THE JOB WITHIN PROMISED TIME",
"PROMOTERS(8-10)"]
        ]);
    }
}
