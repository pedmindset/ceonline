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
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email</label>
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


                        <div class="sm:col-span-2">
                            <div class="flex justify-between">
                                <label for="how_can_we_help" class="block text-sm font-medium leading-5 text-gray-700">Expectation</label>
                                <span class="text-sm leading-5 text-gray-500">Max. 500 characters</span>
                            </div>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <textarea v-model="expectation" placeholder="Optional"  id="how_can_we_help" rows="4" class="form-textarea block w-full transition ease-in-out duration-150 sm:text-sm sm:leading-5"></textarea>
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
        </div>
    </body>
    <script>

        var user = @json($user);
        var event = @json($event);


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
                        })
                        }else{
                            self.$swal.fire({
                                icon: 'warning',
                                title: 'Validate',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: function(toast) {
                                    toast.addEventListener('mouseenter', self.$swal.stopTimer)
                                    toast.addEventListener('mouseleave', self.$swal.resumeTimer)
                                }
                            });
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
