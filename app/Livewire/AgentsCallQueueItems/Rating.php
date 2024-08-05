<?php

namespace App\Livewire\AgentsCallQueueItems;

use Livewire\Component;

class Rating extends Component
{
    public $rating = 0;
    public $hoverRating = 0;

    public function setRating($rating)
    {
        $this->rating = $rating;
        $this->hoverRating = $rating; // Ensure the clicked emoji remains highlighted
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
    }
}
