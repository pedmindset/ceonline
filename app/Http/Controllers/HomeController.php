<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\PaymentCategory;
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

        $latest_service = Service::with(['videos', 'comments'=> function($q){
            $q->latest();
            $q->with('user');
        },  'announcements' => function($q){
            $q->latest();
        }])->latest()->first();

        // $service_videos_check = Service::has('videos')->with(['videos', 'comments'=> function($q){
        //     $q->latest();
        //      $q->with('user');
        // }])->latest()->first();

        $latest_service_has_a_video_check = $latest_service->videos()->exists();

        
        if($latest_service_has_a_video_check){
            $service = $latest_service;
        }elseif (!empty($latest_service->link)) {
            $service = $latest_service;
        }else{
            toastr()->warning( $latest_service->title. ' has not started yet')->success('You can watch a prevoius service');
            $service = $latest_service;
        }
      

        $this->check_attendance($service);

        $video_iframe = $this->video_parse($service);

        $services = Service::latest()
                            ->with(['servicetype', 'announcements' => function($q){
                                $q->latest();
                            }])
                            ->limit(4)
                            ->get();

        $payment_categories = PaymentCategory::all();

      

        // dd (extension_loaded('redis'));

        $timezone = geoip($request->ip());
        $timezone = $timezone['timezone'];

        return view('users.dashboard', compact('service', 'services', 'user','video_iframe', 'timezone', 'payment_categories'));
    }

    private function check_attendance($service)
    {
        $user = auth()->user();
        
        $check_attendance = Attendance::where('user_id', $user->id)
        ->where('service_id', $service->id)->latest()->first();

        if($check_attendance){
            $check_attendance->count = 1;
            $check_attendance->updated_at = now()->toDateTimeString();
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
                'rel' => 0
             ];

            //Optional attributes for embed container
            $attributes = [
            'type' => null,
            'class' => 'w-full sm:h-video',
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
