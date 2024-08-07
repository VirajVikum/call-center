<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- drop down tags -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />    <title>Document</title>

    @livewireStyles

</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<!-- dropdown tags -->
<script>
$(document).ready(function() {
    $('.js-example-tags').select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
});
</script>

<style>
    .custom-li {
        height: 40px;
        padding: 0px; /* Adjust padding as needed */
        border-bottom: 2px solid transparent; /* Initial border color set to transparent */
        transition: border-color 0.3s; /* Smooth transition effect */
    }

    .custom-li:hover {
        border-bottom-color: blue; /* Blue border color on hover */
    }
</style>


<body>
    


<nav class="bg-gray border-gray-500 dark:bg-gray-900 pt-2"> 
    <div class="max-w-screen-xl px-4 py-1 ">
        <div class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" class="pt-0  mr-3" alt="AUSO logo" style="width:110px;height:60px;"/>
            <ul class="flex flex-row font-medium mt-2 space-x-8 rtl:space-x-reverse text-sm">
                <!-- <li class="custom-li">
                    <img src="{{ asset('images/logo.png') }}" class="pt-0" alt="AUSO logo" style="width:110px;height:60px;"/>
                </li> -->
                <li class="custom-li">
                    <a href="{{route('dashboard')}}?var=Dashboard" class="text-gray-900 dark:text-white" aria-current="page">Dashboard</a>
                </li>
                
                <!-- <li class="custom-li">
                    <a href="{{route('leads')}}?var=Leads" class="text-gray-900 dark:text-white">Leads</a>
                </li> -->
                
                <!-- <li class="custom-li">
                    <a href="{{route('tickets')}}?var=Tickets" class="text-gray-900 dark:text-white">Tickets</a>
                </li>
                <li class="custom-li">
                    <a href="{{route('orders')}}?var=Orders" class="text-gray-900 dark:text-white">Orders</a>
                </li>
                <li class="custom-li">
                    <a href="{{route('contact')}}?var=Contact Feed" class="text-gray-900 dark:text-white">Contact Feed</a>
                </li> -->
                <!-- <li class="custom-li">
                    <a href="{{route('reports')}}?var=Reports" class="text-gray-900 dark:text-white">Reports</a>
                </li> -->
                @role('admin')
                <li class="custom-li">
                    <a href="{{route('settings')}}?var=Settings" class="text-gray-900 dark:text-white">Settings</a>
                </li>
                @endrole
                <div class="absolute right-0">
                
                <li class="nav-item dropdown  mr-8"> 
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                 
                </li> 
                </div>
                </div>
                
                </ul>
            
        </div>
    </div>
</nav>


<!-- <nav class="bg-white border-black-700 dark:bg-gray-500">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-3">
         
             <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Call center Admin Dashboard</span> 
            <h3 class="p-1 ml-6">Dashboard</h3>
        
         
    </div>
</nav> -->
@if(isset($variable))
<nav class="bg-white border-black-700 dark:bg-gray-500 pl-0">
    <div class="flex flex-wrap justify-between items-center max-w-screen-xl p-3 ">
         
    
    <h3 class="p-1 ml-6">{{ $variable }}</h3>
    
        
         
    </div>
    @endif
</nav>

         <main class="p-4 ml-0">
            @yield('content')
        </main> 


        @livewireScripts
        {{-- @livewire('livewire-ui-modal') --}}
        
        

</body>
</html>