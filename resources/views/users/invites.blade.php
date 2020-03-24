@extends('layouts.website')

@section('title', 'Dasboard')

@push('page-title')
<div class="flex justify-between">
  <p class="hidden sm:block">Your Invites</p>
  <span v-on:click="shareURl = true" class="flex cursor-pointer mt-1 block px-6 py-1 mx-auto sm:mx-0 rounded-full text-base font-medium text-white bg-red-500 hover:text-indigo-50 hover:bg-indigo-600 focus:outline-none focus:text-white focus:bg-indigo-600"> <i class="las la-users text-3xl py-2 mr-1"></i> <span class="py-3 ml-1">Invite Friends & Family!</span></span> 

</div>
@endpush

@push('custom-styles')

@endpush

@push('page-content')
<div class="max-w-8xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex flex-wrap justify-around my-8">
        
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-users text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">{{ $total_year }}</p>
            <time class="text-sm">Total #</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-users text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">{{ $total_month }}</p>
            <time class="text-sm">Total this Month</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-users text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">{{ $total_week }}</p>
            <time class="text-sm">Total this Week</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-users text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">{{ $total_day }}</p>
            <time class="text-sm">Total Today</time>
        </div>

    </div>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
            <thead>
                <tr>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Service
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($invites as $invite)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                        {{ $invite->user->name ?? 'user'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $invite->service->title ?? 'NA'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $invite->created_at->toDateString() }}
                    </td>
                    </tr>
                @empty
                <p class="my-2 p-4 text-sm text-gray-500">You have not invited anyone yet.</p>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
  </div>
</div>
  @endpush

  @push('custom-scripts')  
  <script>
  
      var service = <?= json_encode($service); ?>
  
      var payment_categories = <?= json_encode($payment_categories); ?>
  
      var user = <?= json_encode($user); ?>
      
  
      const app = new Vue({
          el: '#myapp',
          data: function(){
          return{
                  payment_modal: false,
                  raveKey: 'FLWPUBK-1beb6ca9cea567480a782f5f99294d64-X',
                  email: user.email,
                  amount: '',
                  phone: '',
                  fname: '',
                  lname: '',
                  payment_category: '',
                  data: '',
                  service: service,
                  user: user,
                  message: '',
                  submit_comment: false,
                  spinner: false,
                  payment_categories: payment_categories,
                  currency: 'GHS',
                  country: 'GH',
                  shareURl: false,
  
              }
          },
  
          computed: {
  
              rave_country: function(){
                if(this.currency == "GHS"){
                    return this.country = 'GH'
                }
  
                if(this.currency == "NGN"){
                    return this.country = 'NG'
                }
  
                if(this.currency == "USD"){
                    return this.country = 'US'
                }
              },
  
              first_name(){
                try {
                    this.fname = user.name.split(' ')[0]
                  } catch (error) {
                    console.log(error);
                    this.fname = user.name;
                  }
                  return this.fname
              },
  
              last_name(){
                try {
                  this.lname = user.name.split(' ')[1]
                } catch (error) {
                  return 
                }
                return this.lname;
              },
  
              reference(){
                let text = "";
                let possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  
                for( let i=0; i < 10; i++ )
                  text += possible.charAt(Math.floor(Math.random() * possible.length));
  
                return text;
              }
          },
      
          methods: {

            first_timer: function(){
            var self = this;
            self.$swal.fire({
              title: 'Are you a First Timer?',
              text: "Is this your first time worshiping with us!",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, My First Time!'
            }).then((result) => {
              if (result.value) {
                axios.post('../first_timer',{
                  'service': self.service.id
                }).then(function(r){
                  self.$swal.fire(
                  'Success!',
                  r.data.message,
                  'success'
                )
                }).catch(function(e){

                })
               
              }
            })
           
          },

          salvation: function(){
            var self = this;
            self.$swal.fire({
              title: 'Accept the Lord Jesus',
              text: "Do you want to accept the Lord Jesus as your Lord and personal Savior",
              icon: 'info',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes!'
            }).then((result) => {
              if (result.value) {
                axios.post('../salvation',{
                'service': this.service.id
              }).then(function(r){
                self.$swal.fire(
                  'Success!',
                  r.data.message,
                  'success'
                )
                }).catch(function(e){

                })
               
              }
            })
          },

            closeShareURL: function () {
                console.log(this.shareURl = false);
                
            },
            rave_callback: function(response){
              this.payment_modal = false;
              var self = this;
              if(response.data.data.status == 'successful'){
                axios.post('../payments', {
                    church: this.service.church_id,
                    service: this.service.id,
                    user: this.user.id,
                    amount: this.amount,
                    currency: this.currency,
                    payment_category: this.payment_category
                }).then(function(response){
                  self.amount = '';
                  self.payment_modal = false
  
  
                }).catch(function(e){
  
                    console.log(e);
                })
              }
            
            },
            rave_close: function(){
              this.payment_modal = false;
              this.amount = ''
              console.log("Payment closed")
            },
        }

      
      })
      
      </script>
  @endpush