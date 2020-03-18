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
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">   
    <div class="grid grid-rows-2 md:grid-cols-4 gap-2">
        <div class="col-span-3 row-span-2">
            <div class=" h-auto md:w-full lg:w-11/12 bg-black flex justify-center items-center">
              <video class="video-js vjs-big-play-centered vjs-16-9" data-setup='{"controls": true, "autoplay": true, "preload": "auto"}'>
                <source src="https://immout.netromedia.com/Superscreen/nungua/playlist.m3u8" type="video/mp4">
                
              </video>
            </div>
            <div class="p-2 lg:p-0 xl:p-0">
                <p class="pt-4 pb-1 text-lg text-gray-700">Sunday Service with Pastor Earnest</p>
                <p class="pb-4 pt-1 text text-gray-500">Feb 3, 2020</p>
            </div>
        </div>
        <div class="col-span-1 row-span-2 m-1 lg:m-0 xl:m-0 flex md:flex-col">
            <div class="w-56 h-auto my-3 py-5 bg-indigo-500 rounded-lg shadow-2xl flex flex-col text-white items-center mx-2">
                <span class="rounded-full bg-white">
                    <i class=" text-indigo-400 las la-church text-3xl p-3"></i>
                </span>
                <p class="text-3xl mt-2 font-bold">5</p>
                <p class="mt-1 text-center">Monthly <br>Attendence</p>
            </div>
            <div class="w-56 h-auto my-3 py-5 bg-indigo-500 rounded-lg shadow-2xl flex flex-col text-white items-center mx-2">
                <span class="rounded-full bg-white">
                    <i class=" text-indigo-400 las la-wallet text-3xl p-3"></i>
                </span>
                <p class="text-3xl mt-2 font-bold">GHS 4</p>
                <p class="mt-1">Total Givings</p>
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
                                Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. 
                                Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0 py-2">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>
                                <time datetime="2020-01-07">January 7, 2020</time>
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
                        Healing School
                            </div>
                            <div class="ml-2 flex-shrink-0 flex">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">
                                Urgent
                            </span>
                            </div>
                        </div>
                        <div class="mt-2 flex-col justify-between">
                            <div class="sm:flex text-gray-500 py-2 text-sm">
                                Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. 
                                Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. 
                            </div>
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mt-0 py-2">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            <span>
                                <time datetime="2020-01-07">January 3, 2020</time>
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
                              <time datetime="2020-01-07">January 7, 2020</time>
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
                                <time datetime="2020-01-07">January 23, 2020</time>
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
                              Prayer Meeting
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
                              <time datetime="2020-01-07">January 7, 2020</time>
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
                                <time datetime="2020-01-07">January 23, 2020</time>
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
@endpush
@push('custom-scripts')
<script src="https://vjs.zencdn.net/7.6.6/video.js"></script>

@endpush