<?php

namespace App\Livewire\AgentsCallQueueItems;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Rating extends Component
{
    

    public $rating = 0;
    public $hoverRating = 0;

    public function setRating($rating)
    {
        Log::info('Set Ratings', ['time' => now()]);
        $this->rating = $rating;
        $this->hoverRating = $rating; // Ensure the clicked emoji remains highlighted
        $this->dispatch('set-rating',$this->rating);
    }

    public function setHoverRating($rating) 
    {
        $this->hoverRating = $rating;
    }

    public function resetHoverRating()
    {
        $this->hoverRating = $this->rating; // Ensure the clicked emoji remains highlighted
    }

    public function render()
    {
        return view('livewire.agents-call-queue-items.rating');
        Log::info('Show ratings', ['time' => now()]);
    }
}
