@extends('layouts.website')

@section('title', 'Finance')

@push('page-title')
<div class="flex justify-between">
    <p class="hidden sm:block">Your Giving</p>
    <button v-on:click="payment_modal = true" class="my-2 mx-1 inline-flex items-center shadow-md px-8 py-2 border border-transparent text-sm leading-5 font-medium rounded-full  text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150"> 
        <i class="lab la-cc-visa mr-1 text-2xl"></i><i class="lab la-cc-mastercard mr-1 text-2xl"></i><i class="las la-mobile-alt mr-1 text-2xl"></i> Click to Give Securely Online with Bank Card or MoMo
      </button>

      <div style="display: none"  v-show="payment_modal" class="fixed bottom-0 inset-x-0 px-4 pb-6 sm:inset-0 sm:p-0 sm:flex sm:items-center sm:justify-center">
        <div v-show="payment_modal"vx-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div v-show="payment_modal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="bg-white rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
          <div>
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
              <svg class="h-6 w-6 text-green-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-5">
              <h3 class="text-lg leading-6 font-medium text-gray-900">
                Give Online
              </h3>
              <div class="mt-2">
                <p class="text-sm leading-5 text-gray-500">
                  Give with Your Visa, Master Card or Mobile Money.
                </p>
                <div>
                  <div class="mt-6 sm:mt-5  sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="payment_category" class="block text-left my-1 text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                      Category
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                      <div class="rounded-md shadow-sm">
                        <select id="payment_category" v-model="payment_category" class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                          <option value="" disabled>Select Payment Category</option>
                          <option v-for="category in payment_categories" v-bind:value="category.id" >@{{ category.title }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
              
                  <label for="phone" class="my-2 text-left  my-1   block text-sm font-medium leading-5 text-gray-700">Phone Number</label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm sm:leading-5">
                        <li class="las la-phone-alt"></li>
                      </span>
                    </div>
                    <input id="phone" v-model="phone" type="tel" class="form-input block w-full pl-7 pr-12 sm:text-sm sm:leading-5" placeholder="233241582764" />
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                      <span class="text-gray-500 sm:text-sm sm:leading-5">
                        Phone
                      </span>
                    </div>
                  </div>

                  <label for="phone" class="my-2 text-left  my-1  block text-sm font-medium leading-5 text-gray-700">Amount to give</label>
                  <div class="mt-1 relative rounded-md shadow-sm">
                      <div class="absolute inset-y-0 left-0 flex items-center">
                        <select v-model="currency" aria-label="Country" class="form-select h-full py-0 pl-3 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm sm:leading-5">
                          <option value="GHS">GHS</option>
                          <option value="NGN">NGN</option>
                          <option value="USD">USD</option>
                        </select>
                      </div>
                      <input id="amount" v-model="amount" class="form-input block w-full pl-5 text-right pl-16 sm:text-sm sm:leading-5" placeholder="0.00" />
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
          </span>
          <span class="flex w-full rounded-md shadow-sm sm:col-start-1">
            <button v-on:click="payment_modal = false" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>
          </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:col-start-2">
              <Rave
                  style-class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-indigo-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                  :email="email"
                  :amount="amount"
                  :customer-phone="phone"
                  :reference="reference"
                  :rave-key="raveKey"
                  :callback="rave_callback"
                  :close="rave_close"
                  :customer-firstname="first_name"
                  :customer-lastname="last_name"
                  {{-- payment-options="ussd, card, account" --}}
                  hosted-payment=0
                  :currency="currency"
                  :country="rave_country"
              ><i class="lab la-cc-visa mr-1 text-2xl"></i><i class="lab la-cc-mastercard mr-1 text-2xl"></i><i class="las la-mobile-alt mr-1 text-2xl"></i> Give Now</Rave>
          
          </div>
        </div>
      </div>
</div>
  
@endpush

@push('custom-styles')

@endpush

@push('page-content')
<div class="max-w-8xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex flex-wrap justify-around my-8">
        
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-check-circle text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">{{ $total_count }}</p>
            <time class="text-sm">Total #</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-church text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">GHS{{ $total_year }}</p>
            <time class="text-sm">Total Giving</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-handshake text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">GHS{{ $total_partnership }}</p>
            <time class="text-sm">Total Partnership</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-wallet text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">GHS{{ $total_tithe }}</p>
            <time class="text-sm">Total Tithe</time>
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
                    Category
                </th>
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Amount
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
                @forelse ($payments as $payment)
                <tr class="bg-white">
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                        {{ $payment->user->name ?? 'user'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $payment->paymentcategory->title ?? 'NA'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                       @if($payment->currency == null)
                       GHS {{ $payment->amount ?? 'NA'}}
                       @else
                       {{ $payment->currency }} {{ $payment->amount ?? 'NA'}}
                       @endif
                       
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $payment->service->title ?? 'NA'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $payment->created_at->toDateString() }}
                    </td>
                    
                    </tr>
                @empty
                <p class="my-2 p-4 text-sm text-gray-500">No Giving Recorded Yet.</p>
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