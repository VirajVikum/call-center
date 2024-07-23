<div class="block max-w-sm p-6 bg-white p-4 m-3 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full md:w-1/2 lg:w-1/3 h-36 flex justify-between px-5 pt-5">
<div style="display: flex; flex-direction: column;">
<div>
<p class="font-normal text-gray-700 dark:text-gray-400">Skills</p>
</div>
<div class="pt-1">
    <span class="text-base font-semibold pl-5"></span>
</div>
</div>
<!-- <div class="w-12 h-12 bg-orange-300 border border-orange-200 rounded-lg flex justify-center items-center opacity-50">
            <div class="w-10 h-10 text-orange-700">
                 <svg style="position: relative; top: 4px; left: 2px;" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                <path d="M14.05 2a9 9 0 0 1 8 7.94"></path>
                <path d="M14.05 6A5 5 0 0 1 18 10"></path>
                </svg> 
                <svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="none" viewBox="0 0 24 24"><path d="M20 10.999h2C22 5.869 18.127 2 12.99 2v2C17.052 4 20 6.943 20 10.999z"></path><path d="M13 8c2.103 0 3 .897 3 3h2c0-3.225-1.775-5-5-5v2zm3.422 5.443a1.001 1.001 0 0 0-1.391.043l-2.393 2.461c-.576-.11-1.734-.471-2.926-1.66-1.192-1.193-1.553-2.354-1.66-2.926l2.459-2.394a1 1 0 0 0 .043-1.391L6.859 3.513a1 1 0 0 0-1.391-.087l-2.17 1.861a1 1 0 0 0-.29.649c-.015.25-.301 6.172 4.291 10.766C11.305 20.707 16.323 21 17.705 21c.202 0 .326-.006.359-.008a.992.992 0 0 0 .648-.291l1.86-2.171a1 1 0 0 0-.086-1.391l-4.064-3.696z"></path></svg>

            </div>
</div> -->
<div class="pl-5">
@if(is_array($assignedSkills))
@foreach($assignedSkills as $skill)
            <label class="inline-flex items-center cursor-pointer mb-1">
                <input type="checkbox" id="{{ $skill }}" value="{{ $skill }}" class="sr-only peer" wire:model.live="selectedSkills">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300 pl-4">{{ $skill }}</span> 
            </label>

            
        @endforeach
@else
        <p>{{ $assignedSkills }}</p> 
    @endif

    <!-- @dump($selectedSkills); -->


</div>
</div> 