
@php
    
    $currentUrl = url()->current();    
@endphp
<div class="">
<div class="min-h-full">
  <nav class="bg-white border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="flex-shrink-0 flex items-center">
            <h1 class="text-3xl font-bold bg-">FestivalIndia</h1>
          </div>
          <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
            <a href="/" class="{{url('/')==$currentUrl ? 'border-indigo-500 text-gray-900':'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> Home </a>

            <a href="about" class="{{url('/about')==$currentUrl ? 'border-indigo-500 text-gray-900':'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium"> About </a>
          </div>
        </div>
        <div class="hidden sm:ml-6 sm:flex sm:items-center">
          <div class="ml-3 relative">
            <div>
              <button type="button" style="transition: all 0.4s ease;" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none hover:ring-2 hover:ring-offset-2 hover:ring-indigo-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <a href="https://github.com/PrathameshPawar119/Laravel-OpenAI" target="_blank">GitHub</a>
              </button>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex items-center sm:hidden">
          <!-- Mobile menu button -->
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
      <div class="pt-2 pb-3 space-y-1">
        <!-- Current: "bg-indigo-50 border-indigo-500 text-indigo-700", Default: "border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800" -->
        <a href="/" class="{{url('/')==$currentUrl ? 'bg-indigo-50 border-indigo-500 text-indigo-700': 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800'}} block pl-3 pr-4 py-2 border-l-4 text-base font-medium" aria-current="page"> Home </a>

        <a href="about" class="{{url('/about')==$currentUrl ? 'bg-indigo-50 border-indigo-500 text-indigo-700': 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800'}}  block pl-3 pr-4 py-2 border-l-4 text-base font-medium"> About </a>

      </div>
      <div class="pt-4 pb-3 border-t border-gray-200">
        <div class="mt-3 space-y-1">
          {{-- <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"> Your Profile </a>

          <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"> Settings </a>

          <a href="#" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100"> Sign out </a> --}}
        </div>
      </div>
    </div>
  </nav></div>