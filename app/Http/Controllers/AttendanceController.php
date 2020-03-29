<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AttendanceController extends Controller
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
        $validateData = $request->validate([
            'service' => 'required|integer',
            'count' => 'nullable'
        ]);

        $user = $request->user();

        $service = Service::where('id', $request->service)->first();

        if($service){
            $this->check_attendance($service, $request->count);

            return response()->json([
                'message' => 'success',
                'code' => 100
            ]);
        }

        return response()->json([
            'message' => 'failed',
            'code' => 000
        ]);
        
    }

    private function check_attendance(Service $service, $count = 1)
    {
        $user = auth()->user();
        $check_attendance = Attendance::where('user_id', $user->id)
        ->where('service_id', $service->id)->latest()->first();

        if($check_attendance){
            if(!($check_attendance->count == $count)){
                $check_attendance->count = $count;
                $check_attendance->updated_at = now()->toDateTimeString();
                $check_attendance->save();
            }
        }else{
            $attendance = new Attendance;
            $attendance->user_id = $user->id;
            $attendance->service_id = $service->id;
            $attendance->count = $count;
            $attendance->save();
        }
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
