<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Merujan99\LaravelVideoEmbed\Facades\LaravelVideoEmbed;

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

        $service = Service::has('videos')->with(['videos', 'comments'=> function($q){
            return $q->with('user');
        }])->latest()->first();

        $video_iframe = $this->video_parse($service);

        $services = Service::latest()
                            ->with('servicetype', 'announcements')
                            ->limit(4)
                            ->get();

      

        // dd (extension_loaded('redis'));

        $timezone = geoip($request->ip());
        $timezone = $timezone['timezone'];

        return view('users.dashboard', compact('service', 'services', 'user','video_iframe', 'timezone'));
    }

    private function check_attendance($service)
    {
        $check_attendance = Attendance::where('user_id', auth()->user()->id)
        ->where('service_id', $service->id)->latest()->first();

        if($check_attendance){
            $check_attendance->count = 1;
            $check_attendance->service_id = $service->id;
        }else{
            $attendance = new Attendance;
            $attendance->user_id = $user->id;
            $attendance->service_id = $service->id;
            $attendance->count = 1;
            $attendance->save();
        }
    }


    private function video_parse(Service $service)
    {
        if($service->platform != 'imm' & $service->platform != null & $service->link != null){
             //URL to be used for embed generation
            $url = $service->link;

            //Optional array of website names, if present any websites not in the array will result in false being returned by the parser
            $whitelist = ['YouTube', 'Vimeo', 'Facebook', 'Local Content'];

            //Optional parameters to be appended to embed
            $params = [
                'autoplay' => 1,
            ];

            //Optional attributes for embed container
            $attributes = [
            'type' => null,
            'class' => 'w-full h-video',
            'data-html5-parameter' => true
            ];

         

            $video_iframe =  LaravelVideoEmbed::parse($url, $whitelist, $params, $attributes);

            return $video_iframe;
            // dd($video_iframe);
            //<iframe src="https://www.youtube.com/embed/8eK-5ivYb3o?wmode=transparent&amp;autoplay=1&amp;loop=1" type="" width="480" height="295" frameborder="0" allowfullscreen class="iframe-class" data-html5-parameter></iframe>

            // return LaravelVideoEmbed::getYoutubeThumbnail($url)
            // //https://<youtube image thumbnail with max resolution>. usage: <img src="{{ LaravelVideoEmbed::getYoutubeThumbnail($url) }}"> 

         }

         return false;
    }
}
