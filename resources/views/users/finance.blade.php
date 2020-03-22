@extends('layouts.website')

@section('title', 'Dasboard')

@push('page-title')
    Your Giving
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
            <time class="text-sm">Giving no</time>
        </div>
        <div class="h-auto min-w-18 my-3 py-5 bg-white rounded-lg shadow-xl flex flex-col text-gray-500 items-center mx-2">
            <span class="rounded-full bg-indigo-400">
                <i class=" text-white las la-church text-3xl p-3"></i>
            </span>
            <p class="text-lg mt-2 font-bold px-4 max-w-xl">GHS{{ $total_year }}</p>
            <time class="text-sm">Total Givng</time>
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
                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
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
                        {{ $payment->amount ?? 'NA'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $payment->service->title ?? 'NA'}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                        {{ $payment->created_at->toDateString() }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>
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

@endpush