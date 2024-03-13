@extends('layouts.dashboard')

@section('content')





<div class="max-w-4xl mx-auto p-4 pt-3 mt-4 m-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" >

<h6 class="mb-2 ml-3 text-base font-semibold tracking-tight text-gray-900 dark:text-white" style="font-size: 16px;">Administration</h6>

    
    <hr class="mb-3">

    <div class="flex">

    <div class="flex pr-4">
    <svg xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3 ">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
</svg>

    <div><a href="{{route('users')}}">
    <h2 class="mt-2.5 ml-3 mb-2 text-black-900 dark:text-black-900" style="font-size: 16px;">User Management</h2></a>
    <p class="ml-3 font-normal text-gray-500 dark:text-gray-400"style="font-size: 13px;">All user Management Operations </p>
    
    </div>
    </div> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


    <div class="flex ml-4">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3 ml-4">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
</svg>



    <div><a href="{{route('companies')}}">
    <h2 class="mt-2.5 ml-3 mb-2 text-black-900 dark:text-black-900" style="font-size: 16px;">Campaign Management</h2></a>
    <p class="ml-3 font-normal text-gray-500 dark:text-gray-400"style="font-size: 13px;">All campaign Management Operations </p>
    
    </div>
    </div>
    </div>



    
</div>


<div class="pt-5">
<div class="max-w-4xl mx-auto p-4 pt-3 m-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

<h6 class="mb-2 ml-3 text-base font-semibold tracking-tight text-gray-900 dark:text-white" style="font-size: 16px;">Call Server Configurations</h6>

    
    <hr class="mb-3">
    <div class="flex m-auto">

    <div class="flex">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
</svg>


    <div>
    <a href="{{route('extensions')}}"><h2 class="mt-2.5 ml-3 mb-2 text-black-900 dark:text-black-900" style="font-size: 16px;">Extensions</h2></a>
    <p class="ml-3 font-normal text-gray-500 dark:text-gray-400"style="font-size: 13px;">Manage and assign extensions.</p>
    </div>
    </div>

    

    <div class="flex m-auto">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9 9 10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z" />
</svg>


    <div>
    <h2 class="mt-2.5 ml-3 mb-2 text-black-900 dark:text-black-900" style="font-size: 16px;">MOH</h2>
    <p class="ml-3 font-normal text-gray-500 dark:text-gray-400"style="font-size: 13px;">Manage music on hold.</p>
    </div>
    </div>


    <div class="flex">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
</svg>


    <div>
    <a href="{{route('skills')}}"><h2 class="mt-2.5 ml-3 mb-2 text-black-900 dark:text-black-900" style="font-size: 16px;">Skills</h2></a>
    <p class="ml-3 font-normal text-gray-500 dark:text-gray-400"style="font-size: 13px;">Call skills Management.</p>
    </div>
    </div>
    
    </div>



    </div>
    
</div>


@endsection