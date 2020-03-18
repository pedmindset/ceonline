<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AtendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $count = 1)
    {

        $user = $request->user();
        
        $check_attendance = Attendence::where('user_id', $user->id)
                                      ->where('service_id', $request->service)
                                      ->whereBetween('created_at', [
                                            now()->copy()->startOfToday()->toDateTimeString(),
                                            now()->copy()->endOfToday()->toDateTimeString(),
                                      ])->first();
        if($check_attendance){
           if(!$check_attendance->count == $count){
               $check_attendance->count = $count;
           }
        }else{
            $attendance = new Attendance;
            $attendance->user_id = $user->id;
            $attendance->service_id = $request->service;
            $attendance->count = $count;
            $attendance->save();
        }

        return response()->json([
            'message' => 'success',
            'code' => 100
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
