<div class="md:hidden">
    <div @click="sidebarOpen = false" class="fixed inset-0 z-30 bg-gray-600 opacity-0 pointer-events-none transition-opacity ease-linear duration-300" :class="{'opacity-75 pointer-events-auto': sidebarOpen, 'opacity-0 pointer-events-none': !sidebarOpen}"></div>
    <div class="fixed inset-y-0 left-0 flex flex-col z-40 max-w-xs w-full bg-gray-800 transform ease-in-out duration-300 -translate-x-full" :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
      <div class="absolute top-0 right-0 -mr-14 p-1">
        <button x-show="sidebarOpen" @click="sidebarOpen = false" class="flex items-center justify-center h-12 w-12 rounded-full focus:outline-none focus:bg-gray-600">
          <svg class="h-6 w-6 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-shrink-0 flex items-center h-16 px-4 bg-gray-900">
        <img class="h-8 w-auto" src="/img/logos/workflow-logo-on-dark.svg" alt="Workflow" />
      </div>
      <div class="flex-1 h-0 overflow-y-auto">
        <nav class="px-2 py-4">
          <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-white bg-gray-900 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-70">
            <svg class="mr-4 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"/>
            </svg>
            Dashboard
          </a>
          <a href="#" class="mt-1 group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-70">
            <svg class="mr-4 h-6 w-6 text-gray-400 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
            Managments
          </a>
        </nav>
      </div>
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64">
      <div class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-900">
        {{-- <img class="h-8 w-auto" src="/img/logos/workflow-logo-on-dark.svg" alt="Workflow" /> --}}
        <p class="text-white">Field Service</p>
      </div>
      <div class="h-0 flex-1 flex flex-col overflow-y-auto">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <nav class="flex-1 px-2 py-4 bg-gray-800">
          <span x-data="{ sidemenu : false}" >
            <a href="#" x-bind:class="{}" class="group flex items-center px-2 py-2 text-sm leading-5 font-medium text-white rounded-md bg-gray-900 focus:outline-none focus:bg-gray-700 transition ease-in-out duration-70">
              <i class="las la-home text-2xl mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>

              Dashboard
            </a>
          </span>
          <span x-data="{ sidemenu : false}" >
            <a x-on:click="sidemenu = !sidemenu"  href="#"  class="my-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-70">
              <i class="las la-dharmachakra text-2xl  mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
              Engine Room
            </a>
            <ul
              x-on:click.away="sidemenu = false"
              x-show.immediate.transition.in="sidemenu"
             class="pl-4 text-gray-400 text-sm font-light">
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Roles</li>
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Permissions</li>
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Service Areas</li>
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Operating Hours</li>
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Knowledge Base</li>

              <li x-data="{ sidemenu : false}" class="py-2">
                <a href="#" x-on:click="sidemenu = !sidemenu" class="px-2 py-2 mx-1 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200  hover:text-gray-200 focus:bg-gray-900 font-normal transition ease-in-out duration-150">
                  Work Order Managments <i class="las la-angle-down"></i> 
                </a>
                <ul
                    x-on:click.away="sidemenu = false"
                    x-show.immediate.transition.in="sidemenu"
                    class="pl-4 mt-3 py-1 text-gray-400 text-sm font-light">
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Skills Management</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Work-Type Management</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Manage Default Types</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Status Management</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Status Path</li>
                </ul>
              </li>
              <li x-data="{ sidemenu : false}" class="py-2">
                <a href="#" x-on:click="sidemenu = !sidemenu" class="px-2 py-2 mb-2 mx-1 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200  hover:text-gray-200  focus:bg-gray-900 font-normal transition ease-in-out duration-150">
                  Field WorkForce <i class="las la-angle-down"></i> 
                </a>
                <ul
                    x-on:click.away="sidemenu = false"
                    x-show.immediate.transition.in="sidemenu"
                    class="pl-4 mt-3  py-1 text-gray-400 text-sm font-light">
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Field Workers</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Field Crews</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Contractors</li>
                </ul>
              </li>
              <li x-data="{ sidemenu : false}" class="py-2">
                <a href="#" x-on:click="sidemenu = !sidemenu" class="px-2 py-2 mb-2 mx-1 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200  hover:text-gray-200  focus:bg-gray-900 font-normal transition ease-in-out duration-150">
                  Manage Inventory <i class="las la-angle-down"></i> 
                </a>
                <ul
                    x-on:click.away="sidemenu = false"
                    x-show.immediate.transition.in="sidemenu"
                    class="pl-4 mt-3  py-1 text-gray-400 text-sm font-light">
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Storage Locations</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Products</li>
                </ul>
              </li>
              <li x-data="{ sidemenu : false}" class="py-2">
                <a href="#" x-on:click="sidemenu = !sidemenu" class="px-2 py-2 mb-2 mx-1 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200  hover:text-gray-200  focus:bg-gray-900 font-normal transition ease-in-out duration-150">
                  Customer Managment <i class="las la-angle-down"></i> 
                </a>
                <ul
                    x-on:click.away="sidemenu = false"
                    x-show.immediate.transition.in="sidemenu"
                    class="pl-4 mt-3  py-1 text-gray-400 text-sm font-light">
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Customers</li>
                    <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Customer Groups</li>
                </ul>
              </li>
            </ul>
          </span>
          <span x-data="{ sidemenu : false}">
            <a x-on:click="sidemenu = !sidemenu"  href="#"  class="mt-1 group flex items-center px-2 py-2 text-sm leading-5 font-medium text-gray-300 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700 transition ease-in-out duration-70">
              <i class="las la-bars text-2xl  mr-3 h-6 w-6 text-gray-300 group-hover:text-gray-300 group-focus:text-gray-300 transition ease-in-out duration-70"></i>
              Work Order System
            </a>
            <ul
              x-on:click.away="sidemenu = false"
              x-show.immediate.transition.in="sidemenu"
             class="pl-4 text-gray-400 text-sm font-light">
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Roles</li>
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Service Areas</li>
              <li class="mx-1 py-2 px-2 rounded cursor-pointer hover:text-gray-700 hover:bg-gray-200 font-normal transition ease-in-out duration-150">Operating Hours</li>
          </ul>
          </span>
        </nav>
      </div>
    </div>
  </div>
