@extends('layouts.dashboard')

<script>
    // Wait for the document to be fully loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Get the modal element
        const modal = document.getElementById('update-modal');

        // Add the class to show the modal
        modal.classList.remove('hidden');
        modal.setAttribute('aria-hidden', 'false');
    });
</script>

@section('content')

<nav class="bg-white border-black-700 dark:bg-gray-500 p-0">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-3">
         
    
    <h3 class="p-1 ml-6">User Management</h3>

    <div><a href="{{route('asign_extensions')}}">
        <button class="border border-gray rounded-md p-1">Assign Extensions</button></a>
        <button class="border border-gray rounded-md p-1 ml-2">Add Users</button>



            <div id="update-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 flex justify-center items-center w-full h-full bg-black bg-opacity-50">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update User
                </h3>
                <a href="{{route('users')}}">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="update-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button></a>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="{{route('acUser.update',['user'=>$user])}}" method="post">
                @csrf 
                @method('put')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your Full name" required="" value="{{$user->name}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Type</label>
                        <select id="category" name="user_type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$user->user_type_id}}">
                            
                            <option {{ $user->user_type_id == '1' ? 'selected' : '' }} value="1">Super admin</option>
                            <option {{ $user->user_type_id == '2' ? 'selected' : '' }} value="2">Admin</option>
                            <option {{ $user->user_type_id == '3' ? 'selected' : '' }} value="3">Supervisor</option>
                            <option {{ $user->user_type_id == '4' ? 'selected' : '' }} value="4">Agent</option>
                            <option {{ $user->user_type_id == '5' ? 'selected' : '' }} value="5">Outlet Supervisor</option>
                            <option {{ $user->user_type_id == '6' ? 'selected' : '' }} value="6">Outlet User</option>
                            <option {{ $user->user_type_id == '7' ? 'selected' : '' }} value="7">Client Adimn</option>
                            <option {{ $user->user_type_id == '8' ? 'selected' : '' }} value="8">Client Report User</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your Full name" required="" value="{{$user->email}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                        <input type="text" name="user_name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your Full name" required="" value="{{$user->user_name}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your Full name" required="" value="{{$user->phone}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIC</label>
                        <input type="text" name="nic" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your Full name" required="" value="{{$user->nic}}">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="category" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{$user->gender}}">
                            
                            <option {{ $user->gender == 'male' ? 'selected' : '' }} value="male">male</option>
                            <option {{ $user->gender == 'female' ? 'selected' : '' }} value="female">female</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="address" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Your Full name" required="" value="{{$user->address}}">
                    </div>
                    
                    
                    
                </div>
                
                
                <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Update
                </button></a>
            </form>
        </div>
    </div>
</div> 

@endsection