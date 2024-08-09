<?php

namespace App\Jobs;

use App\Models\ad_campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class CheckAvailableTimeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $now = now()->format('Y-m-d H:i'); 
        Log::info('Received time: ' . $now);

    
    $campaigns = ad_campaign::where('next_available_at', '<=', $now)
                            ->where('last_call_status', '2')
                            ->get();

    foreach ($campaigns as $campaign) {
        
        $campaign->status = 2;
        $campaign->save();
    }
    }
}
