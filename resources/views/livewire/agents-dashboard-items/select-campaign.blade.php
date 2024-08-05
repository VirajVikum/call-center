<div>

    <div class=" right-2 px-0 flex space-x-4 pr-4">
            <select id="envType" wire:model.live='selectedBound' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="default" selected>Select Option</option>
                <option value="InBound">In Bound</option>
                <option value="OutBound">Out Bound</option>
            </select>


            @if($selectedBound =="OutBound")
            <select id="campaigns" wire:model.live='selectedCampaign' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Select Campaign</option>
                @if(isset($campaigns))
                    @foreach($campaigns as $campaign)
                    <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>  
                    @endforeach 
                @endif
            </select> 
    </div>
    
@endif

</div>