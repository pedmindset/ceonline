<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function give(Request $request)
    {
        $validateDate = $request->validate([
            'church' => 'required',
            'service' => 'required',
            'user' => 'required',
            'church' => 'required',
            'amount' => 'required',
            'payment_category' => 'nullable',
        ]);
        

        $payment = new Payment;
        $payment->church_id = $request->church;
        $payment->service_id = $request->service;
        $payment->user_id = $request->user;
        if($request->filled('payment_category')){
            $payment->payment_category_id = $request->payment_category;
        }else{
            $payment->payment_category_id = 1;
        }
        $payment->amount = $request->amount;
        $payment->save();

        return response()->json($payment);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payments = Payment::where('user_id', $request->user()->id)
                           ->with('user','service', 'paymentcategory')
                            ->whereBetween('created_at', [
                                now()->copy()->startOfYear()->toDateTimeString(),
                                now()->copy()->endOfYear()->toDateTimeString()
                            ])
                            ->latest()->get();

        $total_year = $payments->sum('amount');
        $total_count = $payments->count();

        $total_tithe = Payment::whereHas('paymentcategory', function ($query) {
            $query->where('title', 'tithe');
        })->sum('amount');

        $total_partnership = Payment::whereHas('paymentcategory', function ($query) {
            $query->where('partnership', 1);
        })->sum('amount');


        return view('users.finance', compact('payments', 'total_year', 'total_count', 'total_tithe', 'total_partnership'));
    }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
