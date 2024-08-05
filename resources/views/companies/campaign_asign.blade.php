@extends('layouts.dashboard')

<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Get the modal element
        const modal = document.getElementById('campaign-assign');

        // Add the class to show the modal
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
    });
</script>

@section('content')

<nav class="bg-white border-black-700 dark:bg-gray-500 p-0">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-3">
         
    
    <h3 class="p-1 ml-6">Campaign Management</h3>

    <div class="mr-8">
        <!-- <button class="border border-gray rounded-md p-1">Assign Extensions</button> -->
        <button class="border border-gray rounded-md p-1 ml-2"data-modal-target="crud-modal" data-modal-toggle="crud-modal">Add Company</button>

    </div>

        <div id="campaign-assign" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 flex justify-center items-center w-full h-full bg-black bg-opacity-75">
        <style>
  #campaign-assign {
    backdrop-filter: blur(5px); /* Adjust blur amount as needed */
  }
</style>
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Campaign 
                </h3><a href="{{route('companies')}}">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="campaign-assign">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal </span>
                </button></a>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{route('data.store')}}" method="post" enctype="multipart/form-data">
                @csrf 
                @method('post')

                <!-- to get company id/name -->

                <div class="grid gap-4 m-4 mt-0  grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="selected_company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Campaign Name</label>
                        <input type="text" name="selected_company_id" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Company name" value="{{$company->id}}" readonly>
                    </div>  
                </div>
                <div class="grid gap-4 m-4 mt-0  grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select campaign</label>
                        <input class="border border-gray rounded-md p-1 ml-2 mr-3" type="file" name="file" id="name">
                    </div>  
                </div>

                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 m-4 mt-0">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Save
                </button>
            </form>
        </div>
    </div>
</div>


       
@endsection