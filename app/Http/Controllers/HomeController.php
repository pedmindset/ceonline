<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $count = 1)
    {
        $user = $request->user();

        $service = Service::whereBetween('created_at', [
                now()->copy()->startOfDay()->toDateTimeString(),
                now()->copy()->endOfDay()->toDateTimeString(),
        ])->first();


        // $cache_service = 'service' . $user->id;

        // if($service){
        //     views($service)->cooldown(60)->record();
        //     if (!(Cache::has($cache_service))) {
        //         Cache::store('file')->put('service.' . $user->id, $service->id, 600);
        //     }
        // }

      
        if($service){
            $check_attendance = Attendance::where('user_id', $user->id)
            ->where('service_id', $service->id)
            ->whereBetween('created_at', [
                now()->copy()->startOfDay()->toDateTimeString(),
                now()->copy()->endOfDay()->toDateTimeString(),
            ])->first();

            if($check_attendance){
                if($check_attendance->count == $count){
                    $check_attendance->count = $count;
                    // $check_attendance->count = $count;
                }
            }else{
                $attendance = new Attendance;
                $attendance->user_id = $user->id;
                $attendance->service_id = $request->service;
                $attendance->count = $count;
                $attendance->save();
            }
        }



        return view('users.dashboard', compact('service', 'user',));
    }
}
