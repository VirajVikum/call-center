<div>
    @if ($isOpen)
        <div class="relative z-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-20 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-4xl h-128 ">
                        
                        <button wire:click='close' class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <div class="p-4">

                            <h1 class=" p-2 text-2xl">Call Answered</h1>
                            <p>Phone Number: {{ $phone }}</p>

                            <h1 class="py-2 font-bold">Customer Ratings</h1>
                            <div class="pb-3"><livewire:agents-call-queue-items.rating /></div>

                            <div>
                                @if(!empty($satisfactReasons))
                                    <h1 class="py-2 font-bold">Satisfaction Reasons</h1>
                                    <div class="max-h-40 overflow-y-auto border border-gray-200 p-2 w-full">
                                        <ul class="space-y-2">
                                            @foreach($satisfactReasons as $reason)
                                                @if(is_array($reason))
                                                    @foreach($reason as $item)
                                                        <li class="flex items-center">
                                                            <input type="checkbox" class="mr-2">{{ $item }}
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li class="flex items-center">
                                                        <input type="checkbox" class="mr-2">{{ $reason }}
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <p>No reasons available.</p>
                                @endif
                            </div>
                            
                            <div>
                                @if(!empty($disSatisfactReasons))
                                <h1 class="py-2 pt-3 font-bold">Disatisfaction Reasons</h1>
                                <div class="max-h-40 overflow-y-auto border border-gray-200 p-2 w-full">
                                    <ul class="space-y-2">
                                        @foreach($disSatisfactReasons as $reason)
                                            @if(is_array($reason))
                                                @foreach($reason as $item)
                                                    <li class="flex items-center text-11px"><input type="checkbox" class=" mr-2">{{ $item }}</li>
                                                @endforeach
                                            @else
                                                <li><input type="checkbox" class=" mr-2">{{ $reason }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No reasons available.</p>
                                @endif
                            </div>
                            </div>

                            <div>
                                <h1 class="py-2 font-bold">Remarks</h1>
                                <textarea name="" id="" cols="60" rows="5"></textarea><br>

                                <button wire:click="answered" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                            </div>

                            

                    </div>




                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
