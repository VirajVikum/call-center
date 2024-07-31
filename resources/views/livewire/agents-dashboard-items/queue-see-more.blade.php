<div>
    @if ($isOpen)
      
      

      <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
          Background backdrop, show/hide based on modal state.
      
          Entering: "ease-out duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
          <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!--
              Modal panel, show/hide based on modal state.
      
              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
              
              

              <button wire:click='close' class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <ul class="max-w-2xl mx-auto mt-20 divide-y  shadow shadow-blue-600 rounded-xl">
                @foreach ($campaignData as $cmpData)
                <li>
                    <details class="group">
                        <summary class="flex items-center gap-3 px-4 py-3 font-medium marker:content-none hover:cursor-pointer">
                            <svg class="w-5 h-5 text-gray-500 transition group-open:rotate-90" xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                </path>
                            </svg>
                            <span>{{ $cmpData['contact_1'] }}</span>
                        </summary>
            
                        <article class="px-4 pb-4">
                            <p>
                                {{ $cmpData['language'] }}
                            </p>
                            <p>
                                {{ $cmpData['data']['CUSTOMER NAME'] }}
                            </p>
                            <p>
                                {{ $cmpData['data']['CENTER'] }}
                            </p>
                            <p>
                                {{ $cmpData['data']['WORK ORDER NO'] }}
                            </p>
                            <p>
                                {{ $cmpData['data']['ACCOUNT NO.'] }}
                            </p>
                            
                            <p>
                                {{ $cmpData['data']['MODEL'] }}
                            </p>
                            <p>
                                {{ $cmpData['data']['MODEL DESCRIPTION'] }}
                            </p>
                        </article>
                    </details>
                </li>
                @endforeach
                
            
            </ul>
            </div>
          </div>
        </div>
      </div>

      

    @endif

  </div>