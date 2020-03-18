@extends('layouts.website')

@section('title', 'Dasboard')

@push('page-title')
    Dashboard
@endpush
@push('custom-styles')
    <link href="https://vjs.zencdn.net/7.6.6/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
@endpush

@push('page-content')
<div id="myapp">
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">   
    <div class="grid grid-rows-2 md:grid-cols-4 gap-2">
        <div class="col-span-4 row-span-2">
            <div class=" h-auto w-full bg-black flex justify-center items-center">
              <video class="video-js vjs-big-play-centered vjs-16-9" data-setup='{"controls": true, "autoplay": true, "preload": "auto"}'>
                <source src="https://immout.netromedia.com/Superscreen/nungua/playlist.m3u8" type="video/mp4">
                
              </video>
            </div>
            <div class="flex flex-col w-full">
                <div class="flex flex-wrap justify-between">
                    <span class="px-4">
                        <p class="pt-4 pb-1 text-lg text-gray-700">Mid-Week Service with Pastor Earnest</p>
                         <p class="pb-4 pt-1 text text-gray-500">18th March, 2020</p>
                    </span>
                    <div x-data="{ open: false }" class="mt-4 px-4">
                        MTN Mobile Money <span class="p-2 px-6 rounded-full bg-indigo-500 shadow text-white">
                            <i class="las la-phone-alt"></i> 054 944 9772
                        </span>
                        {{-- <button  x-on:click="open = true" x-on:click.away="open = false"  type="button" class="inline-flex items-center shadow-md px-8 py-2 my-4 border border-transparent text-sm leading-5 font-medium rounded-full  text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                            Give Online
                          </button>   --}}
                    </div>
                </div>
                
                <div class="sm:col-span-6">
                    {{-- <label for="about" class="block text-sm font-medium leading-5 text-gray-700">
                      comment
                    </label>
                    <div class="mt-1">
                      <textarea id="about" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 md:w-full lg:w-12/12"></textarea>
                      <span class="inline-flex rounded-md">
                        <button type="button" class="inline-flex items-center shadow-md px-8 py-2 my-4 border border-transparent text-sm leading-5 font-medium rounded-full  text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                          Submit
                        </button>
                      </span>                  
                    </div>
                    <p class="mt-2 text-sm text-gray-500">post your thoughts here.</p> --}}
                </div>
            </div>
        </div>

    </div>

    <div class="flex flex-wrap w-full">
        <div class="mt-3 w-full lg:w-6/12">
            <p class="p-2">Announcement</p>
            <div class="bg-white shadow overflow-hidden sm:rounded-md mx-2">
            <ul>
                <li class="border-t border-gray-200">
                    <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                        General
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                Urgent
                            </span>
                            </div>
                        </div>
                        <div class="mt-2 flex-col justify-between">
                            <div class="sm:flex text-gray-500 py-2 text-sm">
                                Mide-Week Service will be carried out online. Thank you
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0 py-2">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>
                                <time datetime="2020-01-07">March 18, 2020</time>
                            </span>
                            </div>
                        </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
            
        </div>
        <div class="mt-3 w-full lg:w-6/12">
            <p class="p-2">Upcoming Services</p>
            <div class="bg-white shadow overflow-hidden sm:rounded-md mx-2">
                <ul>
                  <li class="border-t border-gray-200">
                    <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                      <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                          <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                            Church Service
                          </div>
                          {{-- <div class="ml-2 flex-shrink-0 flex">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                              Full-time
                            </span>
                          </div> --}}
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                          <div class="sm:flex">
                            <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                             <i class="las la-church text-xl"></i>
                              Mid-week Service
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                              <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                              </svg>
                              Online
                            </div>
                          </div>
                          <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>
                              <time datetime="2020-01-07">March 18, 2020</time>
                            </span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="border-t border-gray-200">
                    <a href="#" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                        <div class="px-4 py-4 sm:px-6">
                          <div class="flex items-center justify-between">
                            <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                              Church Service
                            </div>
                            {{-- <div class="ml-2 flex-shrink-0 flex">
                              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Full-time
                              </span>
                            </div> --}}
                          </div>
                          <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                              <div class="mr-6 flex items-center text-sm leading-5 text-gray-500">
                               <i class="las la-church text-xl"></i>
                                Sunday Service
                              </div>
                              <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                Online
                              </div>
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                              <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                              </svg>
                              <span>
                                <time datetime="2020-01-07">March 22, 2020</time>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                  </li>
                </ul>
            </div>
        </div>
    </div>   
</div>
</div>
  

@endpush

@push('custom-scripts')
<script src="https://vjs.zencdn.net/7.6.6/video.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>

    var service = <?= json_encode($service); ?>
    
    var user = <?= json_encode($user); ?>
    
    const app = new Vue({
        el: '#myapp',
        data: function(){
            return {
                data: '',
                service: service,
                user: user,
            }
        },
    
        methods: {
            attendance_count(){
                if(service != null){
                    axios.post('../attendance_count', {
                        service: service.id,
                        count: 1
                    }).then(function(r){
                        console.log(r.data);
                        this.data = r.data
                        
                    }).catch(function(e){
                        console.log(r.data);
                        this.data = r.data
                        
                    })
                }
            }
        },
    
        mounted: function(){
            this.attendance_count();
        }
    
    
    })
    
    </script>
@endpush


