@extends('layouts.dashboard')

@section('content')
<div class="flex justify-center">
<!-- <div class="flex justify-end pt-6 pr-4 w-full h-1 pb-3"> -->



                <!-- <div class="flex gap-3">
                    <div class="">
                        <button class="text-green-500 transition duration-150 ease-in-out delay-150 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm14.024-.983a1.125 1.125 0 0 1 0 1.966l-5.603 3.113A1.125 1.125 0 0 1 9 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>

                    <div>
                        <button class="text-red-500 transition duration-150 ease-in-out delay-150 hover:scale-110 ">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm6-2.438c0-.724.588-1.312 1.313-1.312h4.874c.725 0 1.313.588 1.313 1.313v4.874c0 .725-.588 1.313-1.313 1.313H9.564a1.312 1.312 0 0 1-1.313-1.313V9.564Z" clip-rule="evenodd" />
                              </svg>
                        </button>

                    </div>

                    <div>
                        <button class="text-blue-500 transition duration-150 ease-in-out delay-150 hover:scale-110">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12ZM9 8.25a.75.75 0 0 0-.75.75v6c0 .414.336.75.75.75h.75a.75.75 0 0 0 .75-.75V9a.75.75 0 0 0-.75-.75H9Zm5.25 0a.75.75 0 0 0-.75.75v6c0 .414.336.75.75.75H15a.75.75 0 0 0 .75-.75V9a.75.75 0 0 0-.75-.75h-.75Z" clip-rule="evenodd" />
                              </svg>
                        </button>
                    </div>
                </div> -->
            <!-- </div> -->
</div>


<div class="container m-4 w-100% pt-0" style="display: flex;">


<!-- seperate 2 rows -->
<div style="float: left; width:100%; padding-left:1%; padding-right:1%;">

<div style="display: flex;">

<!-- @can('create details')
Test Create Details
@endcan

@can('edit details')
Test Edit Details
@endcan -->



<livewire:dashboard-items.total-calls />

<livewire:dashboard-items.completed />

<livewire:dashboard-items.ongoing />




</div>


<div style="display: flex;">

<livewire:dashboard-items.no-answer />

<div class="block max-w-sm p-6 bg-white p-4 m-3 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full md:w-1/2 lg:w-1/3 h-36 flex justify-between px-5 pt-5">
<p class="font-normal text-gray-700 dark:text-gray-400">N/A</p>
        <div class="w-12 h-12 p-3 border border-green-300 rounded-lg flex justify-center items-center @if($status==1)bg-yellow-100 @else bg-red-100 @endif">
            <div class="w-5 h-5 ">

            <?php
//             $x=1;
//             $status=1;
// while ($x<5) {
//     if($status==1)
//             {
//                 $status=0;
//             }
//             else{
//                 $status=1;
//             }
   
//     flush();
 
//     sleep(2);
//     $x++;
// }
?>


            <svg style="position: relative; top: -6px; left: -6px;" class="w-8 h-8 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" ><path d="M3.833 4h4.49L9.77 7.618l-2.325 1.55A1 1 0 0 0 7 10c.003.094 0 .001 0 .001v.021a2.129 2.129 0 0 0 .006.134c.006.082.016.193.035.33.039.27.114.642.26 1.08.294.88.87 2.019 1.992 3.141 1.122 1.122 2.261 1.698 3.14 1.992.439.146.81.22 1.082.26a4.424 4.424 0 0 0 .463.04l.013.001h.008s.112-.006.001 0a1 1 0 0 0 .894-.553l.67-1.34 4.436.74v4.32c-2.111.305-7.813.606-12.293-3.874C3.227 11.813 3.527 6.11 3.833 4zm5.24 6.486l1.807-1.204a2 2 0 0 0 .747-2.407L10.18 3.257A2 2 0 0 0 8.323 2H3.781c-.909 0-1.764.631-1.913 1.617-.34 2.242-.801 8.864 4.425 14.09 5.226 5.226 11.848 4.764 14.09 4.425.986-.15 1.617-1.004 1.617-1.913v-4.372a2 2 0 0 0-1.671-1.973l-4.436-.739a2 2 0 0 0-2.118 1.078l-.346.693a4.71 4.71 0 0 1-.363-.105c-.62-.206-1.481-.63-2.359-1.508-.878-.878-1.302-1.739-1.508-2.36a4.583 4.583 0 0 1-.125-.447z" fill="currentColor"></path></svg>


                

            </div>
        </div>

</div>

<div class="block max-w-sm p-6 bg-white p-4 m-3 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 w-full md:w-1/2 lg:w-1/3 h-36 flex justify-between px-5 pt-5">
<p class="font-normal text-gray-700 dark:text-gray-400">N/A</p>
        <div class="w-12 h-12 p-3 bg-green-300 border border-green-300 rounded-lg flex justify-center items-center">
            <div class="w-5 h-5 text-green-700">
            <svg style="position: relative; top: -6px; left: -6px;" class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"><path d="M3.833 4h4.49L9.77 7.618l-2.325 1.55A1 1 0 0 0 7 10c.003.094 0 .001 0 .001v.021a2.129 2.129 0 0 0 .006.134c.006.082.016.193.035.33.039.27.114.642.26 1.08.294.88.87 2.019 1.992 3.141 1.122 1.122 2.261 1.698 3.14 1.992.439.146.81.22 1.082.26a4.424 4.424 0 0 0 .463.04l.013.001h.008s.112-.006.001 0a1 1 0 0 0 .894-.553l.67-1.34 4.436.74v4.32c-2.111.305-7.813.606-12.293-3.874C3.227 11.813 3.527 6.11 3.833 4zm5.24 6.486l1.807-1.204a2 2 0 0 0 .747-2.407L10.18 3.257A2 2 0 0 0 8.323 2H3.781c-.909 0-1.764.631-1.913 1.617-.34 2.242-.801 8.864 4.425 14.09 5.226 5.226 11.848 4.764 14.09 4.425.986-.15 1.617-1.004 1.617-1.913v-4.372a2 2 0 0 0-1.671-1.973l-4.436-.739a2 2 0 0 0-2.118 1.078l-.346.693a4.71 4.71 0 0 1-.363-.105c-.62-.206-1.481-.63-2.359-1.508-.878-.878-1.302-1.739-1.508-2.36a4.583 4.583 0 0 1-.125-.447z" fill="currentColor"></path></svg>
            </div>
        </div>

</div>


</div>

</div>
<!-- close of 2 rows -->





<div style="width: 40%; padding-right:0%;" class="pt-3">

<livewire:dashboard-items.agents/>

</div>


</div>






@endsection



