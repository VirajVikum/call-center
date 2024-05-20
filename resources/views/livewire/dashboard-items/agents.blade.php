<div wire:poll.1000ms class="relative text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white mr-2 pt-0" style="width: 80%;">
    @foreach($agnt as $agent)
    
    

            <div class="m-2">
                <button type="button" class="relative inline-flex items-center w-full w-full md:w-2xl px-4 py-2 text-sm font-medium border-b border-gray-200  hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white ml-0">
                    <!-- <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                    </svg> -->
                    <!-- <svg class="relative w-9 h-9 me-2.5 mr-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.<path d="M256 48C141.1 48 48 141.1 48 256v40c0 13.3-10.7 24-24 24s-24-10.7-24-24V256C0 114.6 114.6 0 256 0S512 114.6 512 256V400.1c0 48.6-39.4 88-88.1 88L313.6 488c-8.3 14.3-23.8 24-41.6 24H240c-26.5 0-48-21.5-48-48s21.5-48 48-48h32c17.8 0 33.3 9.7 41.6 24l110.4 .1c22.1 0 40-17.9 40-40V256c0-114.9-93.1-208-208-208zM144 208h16c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32H144c-35.3 0-64-28.7-64-64V272c0-35.3 28.7-64 64-64zm224 0c35.3 0 64 28.7 64 64v48c0 35.3-28.7 64-64 64H352c-17.7 0-32-14.3-32-32V240c0-17.7 14.3-32 32-32h16z"/></svg>-->
                    <svg class="relative mr-4 object-cover rounded-full h-10 w-10 text-gray-60" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 256 256" xml:space="preserve">

                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path d="M 64.643 15.053 C 62.216 6.384 54.264 0 44.831 0 S 27.445 6.384 25.019 15.053 c -1.695 0.217 -3.022 1.659 -3.022 3.411 v 9.872 c 0 1.9 1.555 3.455 3.455 3.455 s 3.455 -1.555 3.455 -3.455 v -9.872 c 0 -1.189 -0.609 -2.243 -1.531 -2.865 c 2.176 -7.596 9.169 -13.177 17.454 -13.177 c 8.286 0 15.279 5.581 17.454 13.177 c -0.921 0.622 -1.53 1.676 -1.53 2.865 v 9.872 c 0 1.307 0.744 2.437 1.821 3.023 c -0.698 3.214 -2.242 6.114 -4.396 8.453 c -0.148 -0.029 -0.299 -0.046 -0.455 -0.046 c -1.32 0 -2.399 1.08 -2.399 2.399 s 1.08 2.399 2.399 2.399 s 2.399 -1.08 2.399 -2.399 c 0 -0.259 -0.052 -0.504 -0.129 -0.737 c 2.467 -2.688 4.225 -6.031 4.991 -9.733 c 1.528 -0.356 2.679 -1.726 2.679 -3.359 v -9.872 C 67.665 16.712 66.339 15.27 64.643 15.053 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10;  fill: @if($agent->status == 1) rgb(240,88,47) @else rgb(123, 124, 124) @endif; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                    <path d="M 55.893 35.514 c 0.655 -0.905 1.196 -1.885 1.611 -2.917 c -0.802 -1.252 -1.249 -2.724 -1.249 -4.26 v -9.872 c 0 -1.313 0.323 -2.582 0.918 -3.708 c -2.231 -4.703 -7.034 -7.834 -12.342 -7.834 s -10.11 3.131 -12.342 7.835 c 0.595 1.126 0.918 2.395 0.918 3.708 v 9.872 c 0 2.391 -1.065 4.533 -2.74 5.993 c 2.703 5.183 8.111 8.754 14.333 8.754 c 2.059 0 4.028 -0.395 5.842 -1.105 C 50.927 38.892 53.034 36.303 55.893 35.514 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: @if($agent->status == 1) rgb(110,177,225) @else rgb(123, 124, 124) @endif; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                    <path d="M 61.749 47.762 c -1.134 0.818 -2.523 1.303 -4.024 1.303 c -2.299 0 -4.334 -1.135 -5.588 -2.87 c -2.219 0.862 -4.622 1.345 -7.136 1.345 c -3.281 0 -6.375 -0.816 -9.113 -2.234 c -12.235 1.826 -21.7 12.444 -21.7 25.167 v 16.741 c 0 1.532 1.253 2.786 2.786 2.786 h 56.054 c 1.532 0 2.786 -1.254 2.786 -2.786 V 70.474 C 75.813 60.568 70.064 51.96 61.749 47.762 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill:  @if($agent->status == 1) rgb(110,177,225) @else rgb(123, 124, 124) @endif; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                </g>
                                <!-- fill: rgb(240,88,47)     fill: rgb(110,177,225)      fill: rgb(110,177,225)  -->
                            </svg>  &nbsp;&nbsp; 
                            <div style="display: flex; flex-direction: column;">
                                <div class="text-left font-bold fill-blue-500" style="color:gray;">{{$agent->name}}</div> 
                                <div>
                                    @foreach ($skills as $skill)
                                        @if ($agent->id == $skill->agentid && $skill->status == 1 && $agent->status == 1)
                                        <span class="bg-green-200 rounded px-1">{{ $skill->skill }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                    
                </button>
            </div>
            
    @endforeach
   
</div>