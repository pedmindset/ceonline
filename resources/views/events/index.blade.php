<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="Christ Embassy Online" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="http://live.christembassynungua.org" />
        <meta property="og:description" content="You're welcome to Christ Embassy Online Church, Join us worship the Lord in the beauty of His Holiness" />
        <meta name="twitter:image" content="http://live.christembassynungua.org/images/christ_embassy_nungua.jpg" />
        <meta property="og:image" content="http://live.christembassynungua.org/images/christ_embassy_nungua.jpg"  />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('css/bootstrapcss.css') }}" rel="stylesheet"> --}}
        <script src="{{ asset('js/app.js') }}" ></script>
        <title>{{ $event->title }}</title>
        @php
            $bg = array('pastor_earnest_2.jpg', 'christ_embassy_nungua.jpg', 'pastor_earnest.jpg', 'ce_nungua_church.jpg' ); // array of filenames

            $i = rand(0, count($bg)-1); // generate random number size of the array
            $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
         @endphp

          <style type="text/css">
                .bg-image-slider{
                  background-color: rgba(0, 0, 0, 0.267);
                  background-image: url(../images/{{ $selectedBg }});
                  background-repeat: no-repeat;
                  background-blend-mode: overlay;
                  background-position: top;
                };
          </style>
    </head>
    <body>
        <div id="myapp">
          <div class="relative bg-white">
            <div class="lg:absolute lg:inset-0">
              <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover lg:absolute lg:h-full" srcset="{{ $event->getFirstMediaUrl() }}" alt="" />
              </div>
            </div>
            <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:grid lg:grid-cols-2">
              <div class="lg:pr-8">
                <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                  <div class="flex">
                    <h2 class="text-3xl leading-9 px-2 pt-4 font-extrabold tracking-tight sm:text-4xl sm:leading-10">
                      {{ $event->title }}
                    </h2>
                  </div>

                  <p class="mt-4 text-lg leading-7 text-gray-500 sm:mt-3">
                        {{! $event->description !}}
                  </p>
                  <div class="mt-9 grid grid-cols-1 row-gap-6 sm:grid-cols-2 sm:col-gap-8">
                    <div class="sm:col-span-2">
                        <label for="country" class="block text-sm font-medium leading-5 text-gray-700">
                          Title
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                          <select v-model="title" id="title" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            <option value="">Select Title</option>
                            <option>Bro</option>
                            <option>Sis</option>
                            <option>Mr</option>
                            <option>Mrs</option>
                            <option>Miss</option>
                            <option>Pastor</option>
                            <option>Deacon</option>
                            <option>Deaconess</option>
                            <option>Dr</option>
                            <option>Sir</option>
                          </select>
                        </div>
                      </div>
                      <div>
                        <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">First name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                          <input  v-model="fname" id="first_name" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                        </div>
                      </div>
                      <div>
                        <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                          <input v-model="lname" id="last_name" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                        </div>
                      </div>
                    <div class="sm:col-span-2">
                      <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                      <div class="mt-1 relative rounded-md shadow-sm">
                        <input v-model="email" id="email" type="email" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                      </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="phone_number" class="block text-sm font-medium leading-5 text-gray-700">Phone Number</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                          <div class="absolute inset-y-0 left-0 flex items-center">
                            <select v-model="country" aria-label="Country" class="form-select h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm sm:leading-5">
                                <option value="GH">GH</option>
                                <option value="NG">NG</option>
                                <option value="US">US</option>
o                            </select>
                          </div>
                          <input id="phone_number" class="form-input block w-full pl-16 sm:text-sm sm:leading-5" placeholder="+1 (555) 987-6543" />
                        </div>
                      </div>


                    <div class="sm:col-span-2">
                      <div class="flex justify-between">
                        <label for="how_can_we_help" class="block text-sm font-medium leading-5 text-gray-700">Purpose</label>
                        <span class="text-sm leading-5 text-gray-500">Max. 500 characters</span>
                      </div>
                      <div class="mt-1 relative rounded-md shadow-sm">
                        <textarea v-model="expectation" placeholder="Optional"  id="how_can_we_help" rows="4" class="form-textarea block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5"></textarea>
                      </div>
                    </div>

                    <div class="text-right sm:col-span-2">
                      <span class="inline-flex rounded-md shadow-sm">
                         <button class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out" >
                             Register
                         </button>
                      </span>
                    </div>
                </div>
                </div>
              </div>
            </div>
        </div>
        </div>
    </body>
    <script>

        const app = new Vue({
          el: '#myapp',
          data: function(){
              return{
                      payment_modal: false,
                      email: '',
                      expectation: '',
                      title: '',
                      church: '',
                      amount: '',
                      phone: '',
                      fname: '',
                      lname: '',
                      data: '',
                      amountValidation: false,
                      categoryValidation: false

                  }
              },

              computed: {


              },

              methods: {


              checkAmount: function(){
                  if(this.amount == ''){
                  return this.amountValidation = true;
                  }else{
                  return this.amountValidation = false
                  }
              },

              dateFormat: function(d){
                  var date = Moment.tz(d, timezone).fromNow();
                  // console.log(date);
                  if(date == "Invalid date"){
                  return d
                  }
                  return date;

              },



              },

              mounted: function(){

              }
      })

      </script>
</html>
