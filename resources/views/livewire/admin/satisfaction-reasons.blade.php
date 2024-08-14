<div>
    @if ($isOpen)
        <!-- Background blur overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity blur-sm z-10"></div>

        <div class="relative z-20" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-20 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 w-full max-w-6xl h-128">

                        <button wire:click='close' class="text-gray-500 hover:text-gray-700 absolute top-2 right-2 pb-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>

                        <div class="flex m-3">
                            <form class="max-w-md mt-2">
                                <div class="relative pt-6">
                                    
                                    <input type="search" id="default-search"
                                        class="block w-80 p-2 pl-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search in ID, name, Email..." required />
                                </div>
                            </form>
                            <div class="mt-2 ml-auto pt-4 pr-2">
                                <button class="border border-gray rounded-md p-1 ml-2"
                                    wire:click='openedNew'>New</button>
                                <button class="border border-green text-green rounded-md p-1">
                                    <div class="flex">
                                        <span style="color: green;">Export</span> &nbsp;
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="green" class="w-3 h-3 mt-1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                    </div>
                                </button>
                                <button class="border border-gray rounded-md p-1 ml-2">Show/Hide columns</button>
                            </div>
                        </div>

                        <div class="mx-3">
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">Campaign Name</th>
                                            <th scope="col" class="px-6 py-3">Satisfaction Reasons</th>
                                            <th scope="col" class="px-6 py-3">Dissatisfaction Reasons</th>
                                            <th scope="col" class="px-6 py-3">Edit</th>
                                            {{-- <th scope="col" class="px-6 py-3">Delete</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <td class="px-6 py-4"></td>
                                            <td class="px-6 py-4"></td>
                                            <td class="px-6 py-4"></td>
                                            <td class="px-6 py-4"></td>
                                            {{-- <td class="px-6 py-4"></td> --}}
                                        </tr>
                                        @foreach ($campaigns as $campaign)
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <td class="px-6 py-4">{{ $campaign->name }}</td>
                                            <td class="px-6 py-4">
                                                <ul class="list-disc pl-5">
                                                    @foreach ($campaign->satisfactionReasons as $satisfactionReason)
                                                        @foreach ($satisfactionReason->reasons as $reason)
                                                            <li>{{ $reason }}</li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4">
                                                <ul class="list-disc pl-5">
                                                    @foreach ($campaign->dissatisfactionReasons as $dissatisfactionReason)
                                                        @foreach ($dissatisfactionReason->reasons as $reason)
                                                            <li>{{ $reason }}</li>
                                                        @endforeach
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td class="px-6 py-4">
                                                <button type="button" wire:click='editReasons({{$campaign->id}})'>
                                                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 1024 1024" fill="currentColor">
                                                        <path
                                                            d="M396 512a112 112 0 1 0 224 0 112 112 0 1 0-224 0zm546.2-25.8C847.4 286.5 704.1 186 512 186c-192.2 0-335.4 100.5-430.2 300.3a60.3 60.3 0 0 0 0 51.5C176.6 737.5 319.9 838 512 838c192.2 0 335.4-100.5 430.2-300.3 7.7-16.2 7.7-35 0-51.5zM508 688c-97.2 0-176-78.8-176-176s78.8-176 176-176 176 78.8 176 176-78.8 176-176 176z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </td>
                                            {{-- <td class="px-6 py-4">
                                                <button type="button"
                                                    onclick="return confirm('Are you sure you want to delete this user?')"
                                                    wire:click='deleteReasons({{$campaign->id}})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0L5.34 19.673a2.25 2.25 0 0 0 2.244 2.077H15.72a2.25 2.25 0 0 0 2.244-2.077L18.56 5.79z" />
                                                    </svg>
                                                </button>
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($isNew)
        <!-- Background blur overlay for child modal -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity blur-sm z-20"></div>

        <div class="fixed inset-0 flex items-center justify-center z-30">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 z-40">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Assign New Satisfaction & Dissatisfaction Reasons
                    </h3>
                    <button type="button" wire:click="closedNew"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="assign-ext">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaigns</label>
                    <select id="category" wire:model='selectedCampaign' name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="">Select campaign</option>
                        @foreach ($noReasonscampaigns as $campaign)
                            <option value="{{ $campaign->id }}">{{ $campaign->name }}</option>
                        @endforeach
                    </select>
                    @error('selectedCampaign')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <br>



                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Satisfaction Reasons -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="satisfaction"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satisfaction
                                reasons</label>
                            <input type="text" wire:model='newSatisfactionReason'
                                placeholder="Type and press 'Add'"
                                class="block w-full p-2 text-sm text-gray-900 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <div>
                                @error('newSatisfactionReason')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="button" wire:click='addSatisReason'
                                class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md">Add</button><br>
                            <div
                                class="mt-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 p-2 h-48 w-96 overflow-auto">

                                
                                    <ul>
                                        @foreach ($newSatisReasons as $key => $reason)
                                            <li
                                                class="relative flex items-center justify-between p-2 border-b border-gray-200">
                                                <span class="flex-1 overflow-auto whitespace-nowrap text-ellipsis">
                                                    {{ $reason }}
                                                </span>
                                                <button type="button" wire:click='removeSatisReason({{ $key}})'
                                                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-2 py-1 rounded-md flex items-center">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M13.4,12l6.3-6.3c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4l6.3,6.3l-6.3,6.3C4.1,18.5,4,18.7,4,19c0,0.6,0.4,1,1,1c0.3,0,0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L13.4,12z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                               


                            </div>
                            @error('newSatisReasons')
                                <span class="error">{{ $message }}</span>
                            @enderror


                        </div>

                        <!-- Dissatisfaction Reasons -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="dissatisfaction"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dissatisfaction
                                reasons</label>
                            <input type="text" wire:model='newDissatisfactionReason'
                                placeholder="Type and press 'Add'"
                                class="block w-full p-2 text-sm text-gray-900 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <div>
                                @error('newDissatisfactionReason')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="button" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md"
                                wire:click='addDissatisReason'>Add</button>
                            <div
                                class="mt-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 p-2 h-48 w-96 overflow-auto">
                                
                                <ul>
                                    @foreach ($newDissatisReasons as $key => $reason)
                                        <li
                                            class="relative flex items-center justify-between p-2 border-b border-gray-200">
                                            <span class="flex-1 overflow-auto whitespace-nowrap text-ellipsis">
                                                {{ $reason }}
                                            </span>
                                            <button type="button" wire:click='removeDissatisReason({{ $key}})'
                                                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-2 py-1 rounded-md flex items-center">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M13.4,12l6.3-6.3c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4l6.3,6.3l-6.3,6.3C4.1,18.5,4,18.7,4,19c0,0.6,0.4,1,1,1c0.3,0,0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L13.4,12z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            @error('newDissatisReasons')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>



                    @if($isEdit)
                    <button type="button" wire:click='updateReasons'
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Update
                    </button>

                    @else
                    <button type="button" wire:click='assignReasons'
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Assign
                    </button>
                    @endif
                </form>
            </div>
        </div>
    @endif






    @if ($isEdit)
        <!-- Background blur overlay for child modal -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity blur-sm z-20"></div>

        <div class="fixed inset-0 flex items-center justify-center z-30">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 z-40">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Edit Satisfaction & Dissatisfaction Reasons
                    </h3>
                    <button type="button" wire:click="closedNew"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="assign-ext">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaigns</label>
                    <select id="category" wire:model='selectedCampaign' name="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        {{-- <option selected="">Select campaign</option> --}}
                        
                            <option selected value="{{ $editCampaign->id }}">{{ $editCampaign->name }}</option>
                       
                    </select>
                    @error('selectedCampaign')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <br>



                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <!-- Satisfaction Reasons -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="satisfaction"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satisfaction
                                reasons</label>
                            <input type="text" wire:model='newSatisfactionReason'
                                placeholder="Type and press 'Add'"
                                class="block w-full p-2 text-sm text-gray-900 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <div>
                                @error('newSatisfactionReason')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="button" wire:click='addSatisReason'
                                class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md">Add</button><br>
                            <div
                                class="mt-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 p-2 h-48 w-96 overflow-auto">

                                
                                    <ul>
                                        @foreach ($newSatisReasons as $key => $reason)
                                            <li
                                                class="relative flex items-center justify-between p-2 border-b border-gray-200">
                                                <span class="flex-1 overflow-auto whitespace-nowrap text-ellipsis">
                                                    {{ $reason }}
                                                </span>
                                                <button type="button" wire:click='removeSatisReason({{ $key}})'
                                                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-2 py-1 rounded-md flex items-center">
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 24 24" fill="currentColor">
                                                        <path
                                                            d="M13.4,12l6.3-6.3c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4l6.3,6.3l-6.3,6.3C4.1,18.5,4,18.7,4,19c0,0.6,0.4,1,1,1c0.3,0,0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L13.4,12z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                               


                            </div>
                            @error('newSatisReasons')
                                <span class="error">{{ $message }}</span>
                            @enderror


                        </div>

                        <!-- Dissatisfaction Reasons -->
                        <div class="col-span-2 sm:col-span-1">
                            <label for="dissatisfaction"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dissatisfaction
                                reasons</label>
                            <input type="text" wire:model='newDissatisfactionReason'
                                placeholder="Type and press 'Add'"
                                class="block w-full p-2 text-sm text-gray-900 border rounded-lg bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <div>
                                @error('newDissatisfactionReason')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="button" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-md"
                                wire:click='addDissatisReason'>Add</button>
                            <div
                                class="mt-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 p-2 h-48 w-96 overflow-auto">
                                
                                <ul>
                                    @foreach ($newDissatisReasons as $key => $reason)
                                        <li
                                            class="relative flex items-center justify-between p-2 border-b border-gray-200">
                                            <span class="flex-1 overflow-auto whitespace-nowrap text-ellipsis">
                                                {{ $reason }}
                                            </span>
                                            <button type="button" wire:click='removeDissatisReason({{ $key}})'
                                                class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-2 py-1 rounded-md flex items-center">
                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M13.4,12l6.3-6.3c0.4-0.4,0.4-1,0-1.4c-0.4-0.4-1-0.4-1.4,0L12,10.6L5.7,4.3c-0.4-0.4-1-0.4-1.4,0c-0.4,0.4-0.4,1,0,1.4l6.3,6.3l-6.3,6.3C4.1,18.5,4,18.7,4,19c0,0.6,0.4,1,1,1c0.3,0,0.5-0.1,0.7-0.3l6.3-6.3l6.3,6.3c0.2,0.2,0.4,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L13.4,12z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            @error('newDissatisReasons')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>



                    <button type="button" wire:click='updateReasons({{$editCampaign->id}})'
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Update
                    </button>

                    
                </form>
            </div>
        </div>
    @endif
</div>
