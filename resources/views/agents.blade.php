@extends('layouts.agentDashboard')

@section('content')

<nav class="bg-white border-black-700 dark:bg-gray-500 p-0">
    <div class="flex flex-wrap justify-between items-center  max-w-screen-xl p-3 px-4">
         
    
    <h3 class="p-1 ">User Management</h3>

    <div class="absolute right-0 px-0 flex space-x-4 pr-4">
    <form class="max-w-sm">
        
        <select id="countries1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Select Option</option>
            <option value="US">In Bound</option>
            <option value="CA">Out Bound</option>
        </select>
    </form>

    <form class="max-w-sm pr-5">
    
        <select id="countries2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Select Campaign</option>
            <option value="US">United States</option>
            <option value="CA">Canada</option>
            <option value="FR">France</option>
            <option value="DE">Germany</option>
        </select>
    </form>
</div>




    </div>
    
        
         
</div>
</nav>




@endsection