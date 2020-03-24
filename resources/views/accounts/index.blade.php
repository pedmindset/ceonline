@extends('layouts.website')

@section('title', 'Accounts')

@push('page-title')
  <div class="max-w-9xl mx-auto px-4 sm:px-6 md:px-8">
    <h1 class="text-2xl font-semibold text-gray-900">
        Accounts
    </h1>
  </div>
  
@endpush

@push('page-content')

<div class="max-w-9xl max-w mx-auto px-4 sm:px-6 md:px-8">
  <div class="flex flex-row justify-start py-4">
    <div class="hidden max-w-22 min-w-22 w-88   md:block lg:block xl:block mr-4">
        <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6 rounded-md shadow-lg">
            <div class="-ml-4 -mt-4 flex justify-between items-start flex-col">
              <div class="ml-4 mt-4">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    {{-- <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" /> --}}
                    <i class="las la-user-circle text-5xl"></i>
                  </div>
                  <div class="ml-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                      {{ $user->name ?? "N/A" }}
                    </h3>
                    <p class="text-sm leading-5 text-gray-500">
                      <a href="#">
                        {{ '@' }}{{ $user->email ?? 'N/A'}}
                      </a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="ml-4 mt-4 w-full">
                <span class="inline-flex rounded-md shadow-sm">
                  <button type="button" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-50 active:text-gray-800">
                    <svg class="-ml-1 mr-2 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                    </svg>
                    <span>
                      {{ $user->profile->phone ?? "No Phone no!"}}
                    </span>
                  </button>
                </span>
              </div>
            </div>
          </div>
    </div>
  <div class="w-full rounded-md shadow-lg p-4 bg-white">
    <form method="POST" action="../profile_update">
      @csrf
      @method('PUT')
        <div>
          <div>
          
            <div>
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Personal Information
              </h3>
              <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                Use a permanent address where you can receive mail.
              </p>
            </div>
            @php
              $titles = [
                  ['bro' => 'Brother'],
                  ['sis' => 'Sister'],
                  ['mr' => 'Mr'],
                  ['mrs' => 'Mrs'],
                  ['dr' => 'Dr'],
                  ['sir' => 'Sir'],
                  ['dcn' => 'Dcn'],
                  ['dcns' => 'Dcns'],
                  ['pst' => 'Pastor']
              ];    
            @endphp
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                Title
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-xs rounded-md shadow-sm">
                  <select id="title" name="title" class=" @error('title') border-red-300 text-red-900 placeholder-red-300 @enderror block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option disabled>All Titles</option>
                    @foreach($titles as $title)
                    @if(key($title) == old('title'))
                    <option selected value="{{ key($title) }}">{{ current($title) }}</option>
                    @else
                    <option value="{{ key($title) }}">{{ current($title) }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                @error('title')
                    <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                        {{ $message }}
                    </div>
                @enderror
              </div>
            </div>
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
              <label for="church" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                Church
              </label>
              <div class="mt-1 sm:mt-0 sm:col-span-2">
                <div class="max-w-xs rounded-md shadow-sm">
                  <select id="country" name="church" class="@error('church') border-red-300 text-red-900 placeholder-red-300 @enderror block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                    <option disabled>All Churches</option>
                    @foreach($churches as $church)
                    @if($church->id == old('church'))
                    <option selected value="{{ $church->id }}">{{ $church->name }}</option>
                    @else
                    <option value="{{ $church->id }}">{{ $church->name }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                @error('church')
                  <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                      {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mt-6 sm:mt-5">
              <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                  Name
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-xs rounded-md shadow-sm">
                    <input id="name" name="name" value="{{ old('name', $user->name ?? '') }}" class="@error('name') border-red-300 text-red-900 placeholder-red-300 @enderror form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('name')
                    <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
      
              <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="Phone" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                  Phone
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-xs rounded-md shadow-sm">
                    <input id="phone" name="phone" value="{{ old('phone', $user->profile->phone ?? '') }}" class="@error('phone') border-red-300 text-red-900 placeholder-red-300 @enderror form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('phone')
                    <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
      
              <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="email" class="@error('email') border-red-300 text-red-900 placeholder-red-300 @enderror block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                  Email address
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-lg rounded-md shadow-sm">
                    <input id="email" value="{{ old('email', $user->profile->email ?? '') }}" name="email" type="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('email')
                    <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div> 
      
              <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="kings_chat" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                  KingsChat Number
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-lg rounded-md shadow-sm">
                    <input id="kings_chat" value="{{ old('kings_chat', $user->profile->kings_chat ?? '') }}" name="kings_chat" class="@error('kings_chat') border-red-300 text-red-900 placeholder-red-300 @enderror form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('email')
                    <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
      
              <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="city" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                  Date of Birth
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                  <div class="max-w-xs rounded-md shadow-sm">
                    <input id="date_of_birth" value="{{ old('date_of_birth', $user->profile->date_of_birth ?? '') }}" name="date_of_birth" type="date" class="@error('kings_chat') border-red-300 text-red-900 placeholder-red-300 @enderror form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                  </div>
                  @error('date_of_birth')
                    <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>

              <div class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                <fieldset>
                  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                    <div>
                      <legend class=" text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                        Marital Status
                      </legend>
                    </div>
                    <div class="sm:col-span-2">
                      <div class="max-w-lg">
                        <div class="mt-4">
                          <div class="flex items-center">
                            <input id="marital_status" @if(old('marital_status') == 'single') checked @elseif($user->profile->marital_status == 'single') checked @endif value="single" name="marital_status" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                            <label for="marital_status" class="ml-3">
                              <span class="block text-sm leading-5 font-medium text-gray-700">Single</span>
                            </label>
                          </div>
                          <div class="mt-4 flex items-center">
                            <input id="marital_status" @if(old('marital_status') == 'married') checked @elseif($user->profile->marital_status == 'married') checked @endif   name="marital_status" value="married" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                            <label for="marital_status" class="ml-3">
                              <span class="block text-sm leading-5 font-medium text-gray-700">Married</span>
                            </label>
                          </div>
                      
                        </div>
                        @error('date_of_birth')
                          <div class="mt-3 text-red-600 text-sm ml-1" role="alert">
                              {{ $message }}
                          </div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>

        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
          <div class="flex justify-end">
            <span class="inline-flex rounded-md shadow-sm">
              <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                Cancel
              </button>
            </span>
            <span class="ml-3 inline-flex rounded-md shadow-sm">
              <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                Save
              </button>
            </span>
          </div>
        </div>
      </form>
  </div>

</div>
</div>
      
          
   
@endpush
