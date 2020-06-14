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
              <style>
                @keyframes spinner {
                  to {transform: rotate(360deg);}
                }

                .spinner {
                position: relative;
                color: transparent !important;
                pointer-events: none;
              }

                .spinner:before {
                  content: '';
                  box-sizing: border-box;
                  position: absolute;
                  top: 50%;
                  left: 50%;
                  width: 20px;
                  height: 20px;
                  margin-top: -10px;
                  margin-left: -10px;
                  border-radius: 50%;
                  border: 2px solid #ccc;
                  border-top-color: #000;
                  animation: spinner .6s linear infinite;
                }

                </style>
    </head>
    <body>
        <div id="myapp">
          <div class="relative bg-white">
            <div class="lg:absolute lg:inset-0">
              <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover lg:absolute lg:h-full" src="{{ $event->getFirstMediaUrl('banner') }}" alt="" />
              </div>
            </div>
            <div class="relative pt-12 pb-16 px-4 sm:pt-16 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:grid lg:grid-cols-2">
              <div class="lg:pr-8">
                <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                  <div class="flex flex-col justify-start">
                    <h2 class="text-3xl leading-9 pt-4 font-extrabold tracking-tight sm:text-4xl sm:leading-10">
                      {{ $event->title }}
                    </h2>
                    <div class="mt-3 flex items-center text-sm leading-5 text-gray-500 sm:mt-0">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        <span>
                          Date:
                          <time datetime="2020-01-07">{{ $event->start_date->toDayDateTimeString() }}</time>
                        </span>
                      </div>
                    </div>
                  </div>

                  <p class="mt-4 text-lg leading-7 text-gray-500 sm:mt-3">
                        {!! $event->description !!}
                  </p>
                     <div  v-if="registered == false" class="mt-9 grid grid-cols-1 row-gap-6 sm:grid-cols-2 sm:col-gap-8">
                        <div class="sm:col-span-2">
                            <label for="country" class="block text-sm font-medium leading-5 text-gray-700">
                            Title
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <select v-model="title" id="title" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                    <option value="">Select Title</option>
                                    <option value="bro">Bro</option>
                                    <option value="sis">Sis</option>
                                    <option value="mr">Mr</option>
                                    <option value="mrs">Mrs</option>
                                    <option value="miss">Miss</option>
                                    <option value="pst">Pastor</option>
                                    <option value=dcn"">Deacon</option>
                                    <option value="dcns">Deaconess</option>
                                    <option value="dr">Dr</option>
                                    <option value="sir">Sir</option>
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
                        {{-- <div v-if="guest" class="sm:col-span-2">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input v-model="password" id="password" type="password" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                <div class="text-sm text-red-500">@{{ validation.firstError('password') }}</div>
                            </div>
                        </div> --}}

                        <div class="sm:col-span-2">
                            <label for="phone_number" class="block text-sm font-medium leading-5 text-gray-700">Phone Number</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <input  id="phone_number" v-model="phone" type="tel" class="form-input block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5" />
                                <div class="text-sm text-red-500">@{{ validation.firstError('phone') }}</div>
                            </div>
                        </div>

                        <div class="text-right sm:col-span-2">
                            <span class="inline-flex rounded-md shadow-sm flex" >
                                <span v-show="spinner" class="spinner mr-5"></span>
                                <button v-on:click="submitRegistration" class="inline-flex items-center shadow-md px-8 py-2 my-4 border border-transparent text-sm leading-5 font-medium rounded-full  text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150" >
                                    Register for Event
                                </button>
                            </span>
                        </div>
                    </div>
                    <div v-else class="my-9">
                        <div class="rounded-md bg-green-50 p-4 mt-10 sm:col-span-2">
                            <div class="flex">
                              <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                              </div>
                              <div class="ml-3">
                                <h3 class="text-sm leading-5 font-medium text-green-800">
                                  Already Registered
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


              </div>
            </div>
          </div>


      </div>
    </body>
    <script>

        var user = @json($user);
        var event = @json($event);
        var registered = @json($registered);

        const app = new Vue({
          el: '#myapp',
          data: function(){
              return{
                      email: '',
                      expectation: '',
                      title: '',
                      phone: '',
                      name: '',
                      data: '',
                      event: {},
                      user: {},
                      guest: false,
                      registered: false,
                      canSubmit: true,
                      spinner: false,

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

                // phone: function(value) {
                //     return Validator.value(value).required();
                // },

                // password: function(value) {
                //     if(this.guest){
                //         return Validator.value(value).required();
                //     }

                // },

             },

              methods: {
                submitRegistration: function(){
                    var self = this;
                    this.$validate()
                    .then(function (success) {
                        if(self.canSubmit == true){
                            self.spinner = true;
                            self.canSubmit = false;
                            if (success) {
                                axios.post('../events/register/' + this.event.id, {
                                name: self.name,
                                phone: self.phone,
                                email: self.email,
                                title: self.title,
                                expectation: this.expectation,
                            }).then(function(r){
                                if(r.data.code == 200){
                                    self.$swal.fire({
                                        'title': 'Success!',
                                        'text': 'Successfully registered',
                                        'icon': 'success'
                                    });
                                 window.location.href = "/";
                                }


                                if(r.data.code == 400){
                                    self.$swal.fire({
                                        'title': 'Login!',
                                        'text': 'Login to Register',
                                        'icon': 'error'
                                    });

                                    window.location.href = "/login";
                                }

                                }).catch(function(e){
                                    self.canSubmit == true;
                                    self.spinner = false;
                                    console.log(e);
                                    self.$swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: 'Please try agin',
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 10000,
                                        timerProgressBar: true,
                                        onOpen: (toast) => {
                                            toast.addEventListener('mouseenter', self.$swal.stopTimer)
                                            toast.addEventListener('mouseleave', self.$swal.resumeTimer)

                                        }
                                    });

                                })
                            }
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
