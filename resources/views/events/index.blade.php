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
          <div v-if="registered == false" class="relative bg-white">
            <div class="lg:absolute lg:inset-0">
              <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover lg:absolute lg:h-full" src="{{ $event->getFirstMediaUrl('banner') }}" alt="" />
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
                        {!! $event->description !!}
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
                            <div class="text-sm text-red-500">@{{ validation.firstError('title') }}</div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input  v-model="name" id="first_name" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                <div class="text-sm text-red-500">@{{ validation.firstError('name') }}</div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="email" id="email" type="email" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                <div class="text-sm text-red-500">@{{ validation.firstError('email') }}</div>
                            </div>
                        </div>
                        <div v-if="guest" class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="password" id="password" type="password" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                <div class="text-sm text-red-500">@{{ validation.firstError('password') }}</div>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="phone_number" class="block text-sm font-medium leading-5 text-gray-700">Phone Number</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input  id="phone_number" v-model="phone" type="tel" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                <div class="text-sm text-red-500">@{{ validation.firstError('phone') }}</div>
                            </div>
                        </div>

                        <div class="text-right sm:col-span-2">
                            <span class="inline-flex rounded-md shadow-sm">
                                <button v-on:click="submitRegistration" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out" >
                                    Register
                                </button>
                            </span>
                        </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>

          <div v-else>
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                  <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                  </div>
                  <div class="ml-3">
                    <h3 class="text-sm leading-5 font-medium text-green-800">
                      Alredy Registered
                    </h3>
                    <div class="mt-2 text-sm leading-5 text-green-700">
                      <p>
                       Dear @{{ user.name }}, You are registered for @{{ event.title }}
                      </p>
                    </div>
                    <div class="mt-4">
                      <div class="-mx-2 -my-1.5 flex">
                      <a href="{{ url('/') }}">
                        <button class="px-2 py-1.5 rounded-md text-sm leading-5 font-medium text-green-800 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150">
                          Go Home
                        </button>
                      </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </body>
    <script>

        var user = @json($user);
        var event = @json($event);
        var registered = @json($registerd);

        const app = new Vue({
          el: '#myapp',
          data: function(){
              return{
                      email: '',
                      expectation: '',
                      title: '',
                      phone: '',
                      password: '',
                      name: '',
                      data: '',
                      event: {},
                      user: {},
                      guest: false,
                      registered: false,

                  }
              },

              computed: {


              },

             validators: {
                email: function(value) {
                    return Validator.value(value).required().email();
                },

                title: function(value) {
                    return Validator.value(value).required();
                },

                name: function(value) {
                    return Validator.value(value).required();
                },

                phone: function(value) {
                    return Validator.value(value).required();
                },

                password: function(value) {
                    if(this.guest){
                        return Validator.value(value).required();
                    }

                },

             },

              methods: {
                submitRegistration: function(){
                    var self = this;
                    this.$validate()
                    .then(function (success) {
                        if (success) {
                            axios.post('../events/register/' + this.event.id, {
                            name: this.name,
                            phone: this.phone,
                            email: this.email,
                            title: this.title,
                            expectation: this.expectation,
                        }).then(function(r){
                               self.$swal.fire({
                                    'Success!',
                                    'Successfully registered',
                                    'success'
                               })

                                window.location.href = window.location.host;
                            }).catch(function(e){
                                console.log(e);
                               self.$swal.fire({
                                    'Error!',
                                    'Please try agin',
                                    'error'
                                } )

                            })
                        }
                    });

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
                if(registered){
                    this.registered = true
                }else{
                    this.registered = false
                }
                if(user != null){
                    this.user = user;
                    this.name =  user.name;
                    this.email = user.email;
                    this.phone = user.profile != null ? user.profile.phone : '';
                    this.title = user.profile != null ? user.profile.title : '';
                }else{
                    this.guest = true;
                }

                if(event != null){
                    this.event = event;
                }
              }
      })

      </script>
</html>
