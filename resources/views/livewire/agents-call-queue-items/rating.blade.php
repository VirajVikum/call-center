<div>
    <style>
        .emoji {
            transition: transform 0.2s, filter 0.2s;
            font-size: 2rem; /* Adjust size if needed */
        }
    
        .emoji:hover {
            transform: scale(1.2);
        }
    
        .bw {
            filter: grayscale(100%);
        }
    
        .colorful {
            filter: none;
        }
    </style>
    
    <div class="flex items-center">
        @foreach (['😡', '😟', '😐', '🙂', '😃'] as $index => $emoji)
            <span
                class="text-4xl ms-3 cursor-pointer emoji {{ $index + 1 == ($hoverRating ?: $rating) ? 'colorful' : 'bw' }}"
                wire:click="setRating({{ $index + 1 }})"
                wire:mouseover="setHoverRating({{ $index + 1 }})"
                wire:mouseleave="resetHoverRating"
            >
                {{ $emoji }}
            </span>
        @endforeach
    </div>
</div>
