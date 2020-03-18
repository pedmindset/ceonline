<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
    public function index(Request $request)
    {
        $user = $request->user();

        $service = Service::latest()->first();

        $cache_service = 'service' . $user->id;

        if($service){
            views($service)->cooldown(60)->record();
            if (!(Cache::has($cache_service))) {
                Cache::store('file')->put('service.' . $user->id, $service->id, 600);
            }
        }




        return view('users.dashboard', compact('service', 'user',));
    }
}
