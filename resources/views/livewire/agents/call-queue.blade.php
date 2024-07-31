<div class="block max-w-sm p-6 bg-white p-4 m-3 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full md:w-1/2 lg:w-1/3 h-36 flex justify-between px-5 pt-5">
    <div style="display: flex; flex-direction: column;">
        <div>
            
            <p class="font-normal text-gray-700 dark:text-gray-400">
                
                
                    <button type="button" wire:click="findNumber">start</button>

                @if($started)
                    @if($selectedCampaignId && $selectedSkills)
                    <p>Language: {{ $customerLan }}</p>
                    <p><b>Contact: {{ $phone1 }}</b></p>
                    @livewire('agents-dashboard-items.queue-see-more')
                    {{-- <button wire:click="$dispatch('openModals', { component: 'agents-dashboard-items.queue-see-more', data: {{$phone1}} })" class=" rounded">see more</button> --}}
                    <button wire:click="openModal" class=" rounded">see more</button>
                    
                    @else
                    <p>No skills or campaign selected.</p>
                    @endif
                @endif
            </p>
        </div>
        <div class="pt-1">
            <span class="text-base font-semibold pl-5">
                {{-- @livewire('agents-dashboard-items.queue-see-more', ['data' => $phone1]) --}}

            <!-- Button to open the modal -->
            
            </span>
        </div>
    </div>
    <span>
        {{-- <button type="button" wire:click="$dispatch('openModal', { component: 'agents-dashboard-items.queue-more-details', arguments: { phone: '{{ $phone1 }}' }})">see more</button> --}}
    </span>
</div>
