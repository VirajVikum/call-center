<div>
    @if ($isOpen)
        <div class="relative z-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-20 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-4xl h-128 ">

                        <button wire:click='close' class="text-gray-500 hover:text-gray-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        @if ($isAnswered)
                            <div class="p-4">

                                <h1 class=" p-2 text-2xl">Call Answered</h1>
                                <p>Phone Number: {{ $phone }}</p>

                                <h1 class="py-2 font-bold">Customer Ratings</h1>
                                <div class="pb-3"><livewire:agents-call-queue-items.rating /></div>

                                <div>
                                    @if (!empty($satisfactReasons))
                                        <h1 class="py-2 font-bold">Satisfaction Reasons</h1>
                                        <div class="max-h-40 overflow-y-auto border border-gray-200 p-2 w-full">
                                            <ul class="space-y-2">
                                                @foreach ($satisfactReasons as $reason)
                                                    @if (is_array($reason))
                                                        @foreach ($reason as $item)
                                                            <li class="flex items-center">
                                                                <input type="checkbox"
                                                                    wire:model='selectedSatisfactReasons'
                                                                    value="{{ $item }}"
                                                                    class="mr-2">{{ $item }}
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="flex items-center">
                                                            <input type="checkbox" wire:model='selectedSatisfactReasons'
                                                                value="{{ $reason }}"
                                                                class="mr-2">{{ $reason }}
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
                                    @if (!empty($disSatisfactReasons))
                                        <h1 class="py-2 pt-3 font-bold">Disatisfaction Reasons</h1>
                                        <div class="max-h-40 overflow-y-auto border border-gray-200 p-2 w-full">
                                            <ul class="space-y-2">
                                                @foreach ($disSatisfactReasons as $reason)
                                                    @if (is_array($reason))
                                                        @foreach ($reason as $item)
                                                            <li class="flex items-center text-11px"><input
                                                                    type="checkbox"
                                                                    wire:model='selectedDisSatisfactReasons'
                                                                    value="{{ $item }}"
                                                                    class=" mr-2">{{ $item }}</li>
                                                        @endforeach
                                                    @else
                                                        <li><input type="checkbox" class=" mr-2"
                                                                wire:model='selectedDisSatisfactReasons'
                                                                value="{{ $reason }}">{{ $reason }}</li>
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
                                <textarea name="" id="" cols="60" wire:model='remarks' rows="5"></textarea><br>

                                <button wire:click="updateCampaign"
                                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-3 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
                            </div>



                    </div>
    @endif

    @if ($iscallback)
        <div>Set Call Back</div>
        <div class="flex flex-row space-x-4">

            <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg m-2">
                <h2 class="text-lg font-semibold mb-4">Set Time</h2>
                <div class="flex space-x-2">
                    <!-- Date Picker -->
                    <div class="flex-1">
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" id="date" name="date"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" wire:model='date'>
                    </div>
                    <!-- Hours Input -->
                    <div class="flex-1">
                        <label for="hours" class="block text-sm font-medium text-gray-700">Hours</label>
                        <input type="number" id="hours" name="hours" min="1" max="12"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="HH"
                            wire:model='hours'>
                    </div>
                    <!-- Minutes Input -->
                    <div class="flex-1">
                        <label for="minutes" class="block text-sm font-medium text-gray-700">Minutes</label>
                        <input type="number" id="minutes" name="minutes" min="0" max="59"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="MM"
                            wire:model='minutes'>
                    </div>
                    <!-- AM/PM Selector -->
                    <div class="flex-1">
                        <label for="ampm" class="block text-sm font-medium text-gray-700">AM/PM</label>
                        <select id="ampm" name="ampm"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            wire:model='ampm'>
                            <option value="AM" selected>AM</option>
                            <option value="PM">PM</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4">
                    <button
                        class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" wire:click='setCallbackTime'>Set
                        Time</button>
                </div>
                
            </div>

            
        </div>
    @endif




</div>
</div>
</div>
</div>
@endif
</div>
